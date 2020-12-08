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
        $data['posts'] = Post::latest()->approved()->published()->limit(5)->get();
        $data['categories'] = Category::get();
        $data['tags']       = Tag::get();
        $data['nationals']  = Category::where('slug','জাতীয়')->with('posts',function ($query){
            $query->approved()->published()->inRandomOrder()->take(6)->get();
        })->get();
        $data['entertainments']  = Category::where('slug','বিনোদন')->with('posts',function ($query){
            $query->approved()->published()->inRandomOrder()->take(8)->get();
        })->get();
        $data['lifestyles']  = Category::where('slug','লাইফস্টাইল')->with('posts',function ($query){
            $query->approved()->published()->inRandomOrder()->take(5)->get();
        })->get();
        return view('frontend.index',$data);
    }
}
