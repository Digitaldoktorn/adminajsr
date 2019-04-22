@extends('layouts.app')
@section('content')


    <form action="{{ url('posts/'.$post->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <label for="title">Title</label>
        <input id="title" value="{{ $post->title }}"type="text" name="title">

        <label for="content">Content</label>
        <input id="content" value="{{ $post->content }}" type="text" name="content">

        <button type="submit">Update</button>
    </form>

    <form action="{{ url('posts/'.$post->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button type="submit">Delete</button>
    </form>

@endsection