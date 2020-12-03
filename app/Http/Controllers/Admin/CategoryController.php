<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\SlugHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller {
    use SlugHelper;
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


    public function store( Request $request ) {
        $this->validate( $request, [
           'name' => 'required|unique:categories|max:255',
        ] );
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $this->str_slug( $request->name );
        $category->save();
        // Session::flash( 'success', 'Category save successfully' );
        notify()->success('Category save successfully');
        return redirect()->route( 'admin.category.index' );
    }

    public function show( $id ) {
        //
    }


    public function edit( $id ) {
        $data['category'] = Category::findOrFail( $id );
        $data['pageTitle']      ='Category';
        $data['breadcrumb']     ='edit';
        $data['parentRoute']    ='admin.category.index';
        return view( 'backend.admin.category.edit', $data );

    }


    public function update( Request $request, $id ) {
        $this->validate( $request, [
           'name' => 'required|max:255',
        ] );
        $category = Category::findOrFail( $id );
        $category->name = $request->name;
        $category->slug = $this->str_slug( $request->name );
        $category->save();
        notify()->success('Category update successfully');
        return redirect()->route( 'admin.category.index' );
    }


    public function destroy( $id ) {
        $category = Category::where( 'id',$id )->first();
        $category->delete();
        notify()->success('Category delete successfully');
        return redirect()->route( 'admin.category.index' );
    }
}
