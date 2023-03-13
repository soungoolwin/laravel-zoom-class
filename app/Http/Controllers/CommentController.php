<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog ){
       
        $validator = Validator::make($request->all(), [
            'body'=>'required',
        ], [
            'body.required'=>'Say Something.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $validated = $validator->validated();
            $blog->comments()->create([
                'body'=>$validated['body'],
                'user_id'=>auth()->id()
            ]);
            return back();
        }
        
        
        
    }
}
