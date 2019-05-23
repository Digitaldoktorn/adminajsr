@extends('layouts.app')
@section('content')

    <h1>Updates
        @if(Auth::user())
            <a class="btn btn-primary btn-sm" title="Create New Post" href="{{ url('posts/create') }}">+</a>
        @endif
    </h1>

    {{--<ol class="list-unstyled">--}}
        {{--@foreach ($categories as $category)--}}
            {{--<li>--}}
                {{--<a href="/posts/categories/{{ $category }}">--}}
                    {{--{{ $category->name }}--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--@endforeach--}}
    {{--</ol>--}}


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

                            {{--https://carbon.nesbot.com/docs/#api-getters--}}
                            <small class="text-black-50">Published {{ $post->created_at->toDateString() }} </small><br><br>
                            <p class="card-text">{{ $post->content }}</p>
                            @if(Auth::user())
                                <a href="{{ url('posts/'.$post->id.'/edit') }}" class="btn btn-primary">Edit</a>
                            @endif
                        </div>
                    </div>
                @endforeach
                    <br>
                {{ $posts->links() }}
            @else
                <p>No posts found</p>
            @endif
        </div>
    </div>
@endsection