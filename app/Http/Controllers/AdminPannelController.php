<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminPannelController extends Controller
{
    public function index(){
        return view('admin.index', [
            'blogs'=>Blog::query()->paginate(10)
        ]);
    }
    
    public function create(){
        return view('admin.create', [
            'categories'=>Category::all()
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|unique:blogs|max:255',
            'slug'=>'required|unique:blogs',
            'body' => 'required',
            'photo' => 'required|file|max:10240',
            'category_id' =>'exists:categories,id'
        ],[
            'photo.max' => 'The photo must be less than 10 MB.',
        ]);
        $validated['user_id'] = auth()->user()->id;
        $photo = $request->file('photo');
        $photo_dir = $photo->store('blog_photos');
        $validated['photo'] = $photo_dir;

        $blog = new Blog;
        $blog->create($validated);
        return redirect('admin/blogs')->with('success', 'Blog uploaded');
        
    }

    public function destroy(Blog $blog=null){
        $blog->delete();
        Storage::delete($blog->photo);
        return back();
    }

    public function edit(Blog $blog,Request $request){
        return view('admin.edit', [
            'blog'=>$blog,
            'categories'=>Category::all()
        ]);
    }

    public function update(Blog $blog, Request $request){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug'=>'required',
            'body' => 'required',
            'photo' => 'required|file|max:10240',
            'category_id' =>'exists:categories,id'
        ],[
            'photo.max' => 'The photo must be less than 10 MB.',
        ]);
        $validated['user_id'] = auth()->user()->id;
        Storage::delete($blog->photo);
        $photo = $request->file('photo');
        $photo_dir = $photo->store('blog_photos');
        $validated['photo'] = $photo_dir;

        $blog->fill($validated);
        $blog->save();
        return redirect('admin/blogs')->with('success', 'Blog edited ');

    }
}
