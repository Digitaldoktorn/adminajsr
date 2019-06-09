@extends('layouts.app')
@section('content')

    <h1>Updates
        {{--Admin, Boardmember and Localcontact can see this button--}}
        @if(Auth::user()->roles->first()->id <= 3)
            <a class="btn btn-primary btn-sm" title="Create New Post" href="{{ url('posts/create') }}">New post</a>
        @endif
    </h1>
    <br>
    <h5>Sort by categories: </h5>
    <div class="btn-group" role="group" aria-label="Sort by category">

        <button type="button" class="btn btn-light border border-primary"><a href="{{ url('posts') }}">All</a></button>

        @foreach ($categories as $category)
            <button type="button" class="btn btn-light border border-primary"><a
                        href="/posts/categories/{{ $category }}"> {{ $category }}</a></button>
        @endforeach

    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12 mb-2">
            @if(count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ url('posts/'.$post->id) }}">{{ $post->title }}</a></h5>

                            <small class="text-black-50">Published {{ $post->created_at->toDateString() }}
                                by {{ $post->user->name }} </small>
                            <br><br>
                            <p class="card-text">{{ $post->content }}</p>
                            {{--Only the author of the post can see this button--}}
                            @if(Auth::user()->id == $post->user_id)
                                <a href="{{ url('posts/'.$post->id.'/edit') }}" class="btn btn-primary">Edit</a>
                            @endif
                        </div>
                    </div>
                @endforeach
                <br>
                {{--Displays pagination--}}
                {{ $posts->links() }}
            @else
                <p>No posts found</p>
            @endif
        </div>
    </div>
@endsection