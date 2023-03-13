<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(Request $request){
    //     $cleanData = request()->validate([
    //         'username'=>'required',
    //         'name'=>'required',
    //         'email'=>['required','email','string', 'unique:users,email'],
    //         'password'=>'required'
    //     ],[
    //         'username.required'=>'Username is required.',
    //         'name.required'=>'Name is required.',
    //         'email.required'=>'Email is required.',
    //         'email.email'=>'Invalid email format.',
    //         'email.unique'=>'Email is already taken.'
    //     ]
    // );
    //    $user = new User();
    //    $user->name = $cleanData['name'];
    //    $user->username = $cleanData['username'];
    //    $user->email = $cleanData['email'];
    //    $user->password = bcrypt($cleanData['password']);
    //    $user->save();

    //    return redirect('/');

    $validator = Validator::make($request->all(), [
        'username'=>'required',
        'name'=>'required',
        'email'=>['required','email','string', 'unique:users,email'],
        'password'=>'required'
    ],[
            'username.required'=>'Username is required.',
            'name.required'=>'Name is required.',
            'email.required'=>'Email is required.',
            'email.email'=>'Invalid email format.',
            'email.unique'=>'Email is already taken.'
    ]);

    if($validator->fails()){
        return redirect('/register')->withErrors($validator)->withInput();
    }
    $validated = $validator->validated();

       $user = new User();
       $user->name = $validated['name'];
       $user->username = $validated['username'];
       $user->email = $validated['email'];
       $user->password = $validated['password'];
       $user->save();

       Auth::login($user);
       return redirect('/')->with('success','Welcome '.$user->name.'!');
    }

    //for login 
    public function index(){
        return view('login.index');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email'=>['required','email','string'],
            'password'=>'required'
        ],[
                'email.required'=>'Email is required.',
                'email.email'=>'Invalid email format.',
                'email.unique'=>'Email is already taken.'
        ]);
        $validated = $validator->validated();
        $redirect = $request->input('redirect');
        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            if(!empty($redirect)){
                return redirect()->to($redirect);
            }
            return redirect()->intended()->with('success', 'Welcome Back '.$request->user()->name);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
        $user = request()->user();
        Auth::logout($user);
        return redirect()->back()->with('success', 'Bye Bye '.$user->name);
    }
    
}
