<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Post;

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
        return view('home');
    }

//      testar att få in posts på home-sidan-funkar ej
//    public function index()
//    {
//        $posts = Post::orderBy('created_at', 'desc')->get();
//
//        return view('posts/index', compact('posts'));
//    }
}
