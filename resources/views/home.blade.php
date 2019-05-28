@extends('layouts.app')

@section('content')

    {{--Greeting logged in user, see code in AppServiceProvider--}}
    <h1>Welcome {{ $auth->name }}!</h1>
    <p>This is a web portal with internal information for our organisation's members. If you need any help, please send an email to support. Welcome to explore the site!</p>
    <hr>
    <h3>Updates</h3>
    <p>An overview of the latest updates in the categories "Activities", "Local news" and "Materials" are presented here. Check out for more on the Updates page.</p>
    <br>


    <div class="row">
        @foreach ($posts as $post)
            <div class="col-6 mb-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ url('posts/'.$post->id) }}">{{ $post->title }}</a></h5><small class="text-black-50">{{ $post->created_at->toDateString() }} in {{ $post->categories->first() ? $post->categories->first()->name : '' }} </small>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-right"><a href="{{ url('posts') }}">More updates -></a></div>


@endsection
