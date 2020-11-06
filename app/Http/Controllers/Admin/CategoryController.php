<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['categories'] = Category::all();
        $data['pageTitle']      ='Category';
        $data['breadcrumb']     ='list';
        $data['parentRoute']    ='admin.category.index';
        return view( 'backend.admin.category.index',$data );

    }


    public function create() {
        $data['pageTitle']      ='Category';
        $data['breadcrumb']     ='create';
        $data['parentRoute']    ='admin.category.index';
        return view( 'backend.admin.category.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $this->validate( $request, [
            'category' => 'required',
        ] );
        $category = new Category();
        $category->name = $request->category;
        $category->slug = Str::slug( $request->category );
        $category->save();
        // Session::flash( 'success', 'Category save successfully' );
        notify()->success('Category save successfully');
        return redirect()->route( 'admin.category.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {
        $data['category'] = Category::findOrFail( $id );
        $data['pageTitle']      ='Category';
        $data['breadcrumb']     ='edit';
        $data['parentRoute']    ='admin.category.index';
        return view( 'backend.admin.category.edit', $data );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        $this->validate( $request, [
            'category' => 'required',
        ] );
        $category = Category::findOrFail( $id );
        $category->name = $request->category;
        $category->slug = Str::slug( $request->category );
        $category->save();
        notify()->success('Category update successfully');
        return redirect()->route( 'admin.category.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $category = Category::where( 'id',$id )->first();
        $category->delete();
        notify()->success('Category delete successfully');
        return redirect()->route( 'admin.category.index' );
    }
}
