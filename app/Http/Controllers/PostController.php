<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;

use App\Http\Requests\ValidatePost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Limits to 5 posts (order by created at desc)
        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $user = Auth::user();

        if($user->can('create', Post::class)){
            return view('posts.create', compact('categories'));
        } else {
            echo 'Not authorized';
        }
//        exit;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePost $request)
    {
        // dd($request);
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;

        $category = Category::find($request->category_id);
        $array = [];
        $array[] = $category;


        // put the currently logged in user into "$post->user_id"
        $post->user_id = auth()->user()->id;
        $post->save();
        $post->categories()->attach($category);

        return redirect('posts')->with('status', 'Post has been created! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get current logged in user
        $user = Auth::user();

        // load post
        $post = Post::find($id);


        if ($user->can('edit', $post)) {
            return view('posts.edit', compact('post'));
        } else {
            echo 'Not Authorized.';
        }
        
//        $post = Post::find($id);
//        return view('posts.edit', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePost $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;

        // Updating categories
        if(isset($post->categories->first()->id))
        {
            $post->categories()->detach($post->categories->first()->id);
        }

        $post->categories()->attach($request->category_id);
        $post->save();

        return redirect('/posts')->with('status', 'Post updated! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();

        $post = Post::find($id);
        if($user->can('destroy', $post)){
            $post->delete();
            return redirect('/posts')->with('status', 'Post deleted! ');
        } else {
            echo "Not Authorized.";
        }
//        $post = Post::find($id);
//        $post->delete();
//        return redirect('/posts')->with('status', 'Post deleted! ');
    }
}
