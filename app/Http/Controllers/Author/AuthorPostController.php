<?php

namespace App\Http\Controllers\Author;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Traits\SlugHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AuthorPostController extends Controller
{
   use SlugHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        /* $user_id = Auth::user()->id;
        $data['posts'] = Post::where('user_id',$user_id)->latest()->get(); */
        $data['posts'] = Auth::user()->posts()->latest()->get();
        $data['pageTitle'] = 'Post';
        $data['breadcrumb'] = 'list';
        $data['parentRoute'] = 'author.post.index';
        return view( 'backend.author.post.index', $data );
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
        $data['parentRoute'] = 'author.post.index';
        return view( 'backend.author.post.create', $data );
    }

    public function store( Request $request ) {

        $this->validate( $request, [
            'tags'         => 'required|array',
            'tags.*'       => 'integer',
            'categories'   => 'required|array',
            'categories.*' => 'integer',
            'title'        => 'required|string',
            'description'  => 'required',
            'image'        => 'required|mimes:jpg,png,jpeg|max:2024',
        ] );
        $image = $request->file( 'image' );
        $slug = $this->str_slug( $request->title );
        if ( isset( $image ) ) {
            //  make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if ( !Storage::disk( 'public' )->exists( 'post' ) ) {
                Storage::disk( 'public' )->makeDirectory( 'post' );
            }

            // $postImage = Image::make( $image->getRealPath() )->resize( 1600, 1066 )->save( $imageName);
            $postImage = Image::make( $image->getRealPath() )->resize( 1600, 1066 )->stream();
            Storage::disk( 'public' )->put( 'post/' . $imageName, $postImage );

        } else {
            $imageName = "default.png";
        }
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = $this->str_slug( $request->title );
        $post->body = $request->description;
        if ( isset( $request->status ) ) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = false;
        $post->image = $imageName;
        $post->save();
        /*save pivot table data*/
        $post->categories()->attach( $request->categories );
        $post->tags()->attach( $request->tags );
        notify()->success( 'Post save successfully' );
        return redirect()->route( 'author.post.index' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {

        $data['post'] = Post::where( 'id', $id )->first();
        if ($data['post']->user_id != Auth::id())
        {
            notify()->warning( 'You are not authorized to view this post' );
            return redirect()->back();
        }
        $data['pageTitle'] = 'Post';
        $data['breadcrumb'] = 'show';
        $data['parentRoute'] = 'author.post.index';
        return view( 'backend.author.post.show', $data );
    }

    public function edit( $id ) {

        $data['post'] = Post::where( 'id', $id )->first();
        if ($data['post']->user_id != Auth::id())
        {
            notify()->warning( 'You are not authorized to access this post' );
            return redirect()->back();
        }
        $data['tags'] = Tag::all();
        $data['categories'] = Category::all();
        $data['pageTitle'] = 'Post edit';
        $data['breadcrumb'] = 'Post';
        $data['parentRoute'] = 'author.post.index';
        return view( 'backend.author.post.edit', $data );
    }

    public function update( Request $request, $id ) {

        $this->validate( $request, [
            'tags'         => 'required|array',
            'tags.*'       => 'integer',
            'categories'   => 'required|array',
            'categories.*' => 'integer',
            'title'        => 'required|string',
            'description'  => 'required',
            'image'        => 'nullable|mimes:jpg,png,jpeg|max:2024',
        ] );

        $post = Post::where( 'id', $id )->first();

        $image = $request->file( 'image' );
        $slug = $this->str_slug( $request->title );
        if ( isset( $image ) ) {
            //  make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if ( !Storage::disk( 'public' )->exists( 'post' ) ) {
                Storage::disk( 'public' )->makeDirectory( 'post' );
            }
            // delete old post image
            if ( Storage::disk( 'public' )->exists( 'post/' . $post->image ) ) {
                Storage::disk( 'public' )->delete( 'post/' . $post->image );
            }
            $postImage = Image::make( $image->getRealPath() )->resize( 1600, 1066 )->stream();
            Storage::disk( 'public' )->put( 'post/' . $imageName, $postImage );

        } else {
            $imageName = "default.png";
        }
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = $this->str_slug( $request->title );
        $post->body = $request->description;
        $post->image = $imageName;
        if ( isset( $request->status ) ) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = false;
        $post->save();
        /*save pivot table data*/
        $post->categories()->sync( $request->categories );
        $post->tags()->sync( $request->tags );
        notify()->success( 'Post update successfully' );
        return redirect()->route( 'author.post.index' );
    }

    public function destroy( $id ) {
        $post = Post::where( 'id', $id )->first();
        if ($post->user_id != Auth::id())
        {
            notify()->warning( 'You are not authorized to delete this post' );
            return redirect()->back();
        }
        if ( Storage::disk( 'public' )->exists( 'post/' . $post->image ) ) {
            Storage::disk( 'public' )->delete( 'post/' . $post->image );
        }
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        notify()->success( 'Post delete successfully' );
        return redirect()->route( 'author.post.index' );
    }
}
