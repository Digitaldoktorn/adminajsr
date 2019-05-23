<?php

namespace App\Http\Controllers;

use App\Category;

use App\Post;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function index(Category $category)
    {
//        dd($category->posts(), $category->posts);
        $posts = $category->posts()->paginate(5);

//        $posts = Post::latest()->paginate(5);
//        dd($posts);

        return view('posts.index', compact('posts'));
    }
}
