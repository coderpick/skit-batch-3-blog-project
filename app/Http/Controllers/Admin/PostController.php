<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\SlugHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data['pageTitle'] = 'Post';
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

        $this->validate($request,[
            'tags' =>'required',
            'categories' =>'required',
            'title' =>'required|string',
            'description' =>'required',
            'status' =>'required',
            'image' =>'required|mimes:jpg,png,jpeg|max:2024',
        ]);

        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title   = $request->title;
        $post->slug    = $this->str_slug($request->title);
        $post->body = $request->description;
        if(isset($request->status))
        {
            $post->status = true;
        }else {
            $post->status = false;
        }
        $post->is_approved = true;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name ='post'.'_'.time();
            $upload_path = 'uploads/post/';
            $filePath = $upload_path.$file_name.'.'.$image->getClientOriginalExtension();
            $image_url = $upload_path.$filePath;
            $image->move($upload_path,$image_url);
            $post->image = $filePath;
        }
        $post->save();
        /*save pivot table data*/
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);
        notify()->success('Post save successfully');
        return redirect()->route( 'admin.post.index' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {

        $data['post'] = Post::where('slug',$slug)->first();
        $data['pageTitle'] = 'Post';
        $data['breadcrumb'] = 'show';
        $data['parentRoute'] = 'admin.post.index';
        return view('backend.admin.post.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
        /*if ($form->visa != null && File::exists(public_path($form->visa))) {
                    File::delete(public_path($form->visa));
                }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
