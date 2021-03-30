<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function postByCategory($slug){
        $category = Category::where('slug',$slug)->first();
       return $posts =$category->posts()->approved()->published()->paginate(12);
        return view('frontend.post',compact('posts'));
    }
}
