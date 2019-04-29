@extends('layouts.app')
@section('content')

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <hr>
    <small>{{ $post->created_at }}</small><br>

    <a href="/posts" class="btn btn-sm btn-primary">Go back</a>

@endsection