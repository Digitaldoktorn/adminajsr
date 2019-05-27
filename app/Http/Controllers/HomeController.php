<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(6)->get();
        $categories = Category::all();

        // get the inlogged users id
//        $user_id = auth()->user()->id;
//        $user = User::find($user_id);

//        "->with" makes it possible to show posts on home page
        return view('home', compact('categories', 'posts'));

    }
}
