<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tags'] = Tag::all();
        $data['pageTitle']      ='Tag';
        $data['breadcrumb']     ='list';
        $data['parentRoute']    ='admin.tag.index';
        return view('backend.admin.tag.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle']      ='Tag';
        $data['breadcrumb']     ='create';
        $data['parentRoute']    ='admin.tag.index';
        return view('backend.admin.tag.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tag'=>'required'
        ]);
        $tag = new Tag();
        $tag->name = $request->tag;
        $tag->slug = Str::slug($request->tag);
        $tag->save();
        Session::flash('success', 'Tag save successfully');
        return redirect()->route('admin.tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $tag = Tag::where('id',$id)->first();
        $data['tag']            = Tag::findOrFail($id);
        $data['pageTitle']      ='Tag';
        $data['breadcrumb']     ='edit';
        $data['parentRoute']    ='admin.tag.index';
        return view('backend.admin.tag.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'tag'=>'required'
        ]);
        $tag = Tag::findOrFail($id);
        $tag->name = $request->tag;
        $tag->slug = Str::slug($request->tag);
        $tag->save();
        Session::flash('success', 'Tag update successfully');
        return redirect()->route('admin.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        Session::flash('success', 'Tag delete successfully');
        return redirect()->route('admin.tag.index');
    }
}
