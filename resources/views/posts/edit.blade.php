@extends('layouts.app')
@section('content')

    <h1>Edit</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger text-left">
            <strong>Whoops!</strong> There were problems with input:
            <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row">
        <div class="col-12 col-md-4">
            <form class="form" action="{{ url('posts/'.$post->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" value="{{ $post->title }}" class="form-control" type="text" name="title">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" value="{{ $post->content }}" class="form-control" type="textarea"
                           name="content">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <select class="custom-select" id="category" name="category_id">
                        <option value="" disabled selected>Choose Category</option>
                        @foreach ($categories as $category)
                            <option id="category_id" value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <br>
            <form action="{{ url('posts/'.$post->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button class="btn btn-danger" type="submit">Delete</button>
            </form>

        </div>
    </div>


@endsection