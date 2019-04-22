@extends('layouts.app')
@section('content')

    @foreach ($posts as $post)
        <a href="{{ url('posts/'.$post->id) }}">
        {{ $post->title }}</a><br>
    @endforeach

@endsection