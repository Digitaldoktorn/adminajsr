@extends('layouts.app')
@section('content')

    <h1>Blog
        @if(Auth::user())
            <a class="btn btn-primary btn-sm" title="Create New Post" href="{{ url('posts/create') }}">+</a>
        @endif
    </h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ url('posts/'.$post->id) }}">{{ $post->title }}</a></h5>
                        <p class="card-text">{{ $post->content }}</p>
                        @if(Auth::user())
                            <a href="{{ url('posts/'.$post->id.'/edit') }}" class="btn btn-primary">Edit</a>
                        @endif
                    </div>
                </div>

            </div>


        @endforeach

    </div>


@endsection