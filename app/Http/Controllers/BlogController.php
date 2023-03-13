<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('blogs.index',[
            'blogs'=> Blog::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString(),
            'categories'=>Category::all(),
            'currentCategory'=>request('category')
        ]);
    }

    public function show(Blog $blog){
        return view('blogs.show', [
            'blog'=>$blog,
            'RandomBlogs'=>Blog::inRandomOrder()->take(3)->get()
        ]);
    }
}
