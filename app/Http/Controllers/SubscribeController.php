<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribeToggle(Blog $blog)
    {
        if (auth()->user()->isSubscribed($blog)) {
            $blog->subscribers()->detach(auth()->user()->id);
        } else {
            $blog->subscribers()->attach(auth()->user()->id);
        }
        return back();
    }
}
