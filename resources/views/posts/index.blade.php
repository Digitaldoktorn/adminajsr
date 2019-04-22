@extends('layouts.app')
@section('content')

    <a href="{{ url('posts/create') }}">Create new post</a><br>

    @foreach ($posts as $post)
        <a href="{{ url('posts/'.$post->id) }}">
        {{ $post->title }}</a><br>

        <a href="{{ url('posts/'.$post->id.'/edit') }}">Edit</a>


        <hr>
    @endforeach

@endsection