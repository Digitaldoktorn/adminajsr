<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Auth;

    class PageController extends Controller {

        public function localcontacts()
        {
            $title = 'Local contacts';

            return view('pages.localcontacts', compact('title'));
        }

        public function index()
        {
            $posts = Post::orderBy('created_at', 'desc')->take(6)->get();
            $categories = Category::all();

//        compact makes it possible to show posts on home page
            return view('home', compact('categories', 'posts'));

        }

        public function admin()
        {
            $title = 'Admin';

            return view('pages.admin', compact('title'));
        }

    }
