<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data['posts'] = Post::latest()->limit(5)->get();
        $data['categories'] = Category::get();
        $data['tags']       = Tag::get();
        $data['nationals']  = Category::where('slug','জাতীয়')->with('posts')->get();
        return view('frontend.index',$data);
    }
}
