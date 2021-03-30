<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Notifications\AuthorPostApproved;
use App\Notifications\NewPostNotify;
use App\Traits\SlugHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller {
	use SlugHelper;
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data['posts'] = Post::latest()->get();
		$data['pageTitle'] = 'Post';
		$data['breadcrumb'] = 'list';
		$data['parentRoute'] = 'admin.post.index';
		return view('backend.admin.post.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$data['tags'] = Tag::all();
		$data['categories'] = Category::all();
		$data['pageTitle'] = 'Post create';
		$data['breadcrumb'] = 'create';
		$data['parentRoute'] = 'admin.post.index';
		return view('backend.admin.post.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$this->validate($request, [
			'tags' => 'required|array',
			'tags.*' => 'integer',
			'categories' => 'required|array',
			'categories.*' => 'integer',
			'title' => 'required|string',
			'description' => 'required',
			'image' => 'required|mimes:jpg,png,jpeg|max:2024',
		]);

		$image = $request->file('image');
		$slug = $this->str_slug($request->title);
		if (isset($image)) {
			//  make unipue name for image
			$currentDate = Carbon::now()->toDateString();
			$imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

			if (!Storage::disk('public')->exists('post')) {
				Storage::disk('public')->makeDirectory('post');
			}

			// $postImage = Image::make( $image->getRealPath() )->resize( 1600, 1066 )->save( $imageName);
			$postImage = Image::make($image->getRealPath())->resize(1600, 1066)->stream();
			Storage::disk('public')->put('post/' . $imageName, $postImage);

		} else {
			$imageName = "default.png";
		}
		$post = new Post();
		$post->user_id = Auth::user()->id;
		$post->title = $request->title;
		$post->slug = $this->str_slug($request->title);
		$post->body = $request->description;
		if (isset($request->status)) {
			$post->status = true;
		} else {
			$post->status = false;
		}
		$post->is_approved = true;
		$post->image = $imageName;
		$post->save();
		/*save pivot table data*/
		$post->categories()->attach($request->categories);
		$post->tags()->attach($request->tags);
		$subscribers = Subscriber::all();
		foreach ($subscribers as $subscriber) {
			Notification::route('mail', $subscriber->email)
				->notify(new NewPostNotify($post));
		}
		notify()->success('Post save successfully');
		return redirect()->route('admin.post.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		$data['post'] = Post::where('id', $id)->first();
		$data['pageTitle'] = 'Post';
		$data['breadcrumb'] = 'show';
		$data['parentRoute'] = 'admin.post.index';
		return view('backend.admin.post.show', $data);
	}

	public function pending() {
		$data['posts'] = Post::where('is_approved', false)->latest()->get();
		$data['pageTitle'] = 'Pending Post';
		$data['breadcrumb'] = 'list';
		$data['parentRoute'] = 'admin.post.index';
		return view('backend.admin.post.pending', $data);
	}
	public function approval($id) {
		$post = Post::findOrFail($id);
		if ($post->is_approved == false) {
			$post->is_approved = true;
			$post->save();
			$post->user->notify(new AuthorPostApproved($post));

			$subscribers = Subscriber::all();
			foreach ($subscribers as $subscriber) {
				Notification::route('mail', $subscriber->email)
					->notify(new NewPostNotify($post));
			}

			notify()->success('Post approved successfully');
			return redirect()->route('admin.post.pending');
		} else {
			notify()->success('This Post is already approved');
		}
		return redirect()->back();
	}
	public function edit($id) {
		$data['post'] = Post::where('id', $id)->first();
		$data['tags'] = Tag::all();
		$data['categories'] = Category::all();
		$data['pageTitle'] = 'Post edit';
		$data['breadcrumb'] = 'edit';
		$data['parentRoute'] = 'admin.post.index';
		return view('backend.admin.post.edit', $data);
	}

	public function update(Request $request, $id) {

		$this->validate($request, [
			'tags' => 'required|array',
			'tags.*' => 'integer',
			'categories' => 'required|array',
			'categories.*' => 'integer',
			'title' => 'required|string',
			'description' => 'required',
			'image' => 'nullable|mimes:jpg,png,jpeg|max:2024',
		]);

		$post = Post::where('id', $id)->first();

		$image = $request->file('image');
		$slug = $this->str_slug($request->title);
		if (isset($image)) {
			//  make unipue name for image
			$currentDate = Carbon::now()->toDateString();
			$imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

			if (!Storage::disk('public')->exists('post')) {
				Storage::disk('public')->makeDirectory('post');
			}
			// delete old post image
			if (Storage::disk('public')->exists('post/' . $post->image)) {
				Storage::disk('public')->delete('post/' . $post->image);
			}
			$postImage = Image::make($image->getRealPath())->resize(1600, 1066)->stream();
			Storage::disk('public')->put('post/' . $imageName, $postImage);

		} else {
			$imageName = "default.png";
		}
		$post->user_id = Auth::user()->id;
		$post->title = $request->title;
		$post->slug = $this->str_slug($request->title);
		$post->body = $request->description;
		$post->image = $imageName;
		if (isset($request->status)) {
			$post->status = true;
		} else {
			$post->status = false;
		}
		$post->is_approved = true;
		$post->save();
		/*save pivot table data*/
		$post->categories()->sync($request->categories);
		$post->tags()->sync($request->tags);
		notify()->success('Post update successfully');
		return redirect()->route('admin.post.index');
	}

	public function destroy($id) {
		$post = Post::where('id', $id)->first();
		if (Storage::disk('public')->exists('post/' . $post->image)) {
			Storage::disk('public')->delete('post/' . $post->image);
		}
		$post->categories()->detach();
		$post->tags()->detach();
		$post->delete();
		notify()->success('Post delete successfully');
		return redirect()->route('admin.post.index');
	}
}
