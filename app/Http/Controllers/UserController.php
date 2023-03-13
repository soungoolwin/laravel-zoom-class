<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $author){

        return view('blogs', [
            'blogs'=>$author->blogs,
            'categories'=>Category::all()
        ]);
    }
}
