@extends('layouts.app')
@section('content')

    <h1>Create Post</h1>

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
        <div class="col-12 col-md-6">
            <form class="form" action="{{ url('posts') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" class="form-control" type="text" name="title">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" class="form-control" type="textarea" name="content">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="category_id">Category ID</label>--}}
                        {{--<input id="category_id" class="form-control" type="number" min="1" max="3" name="category_id">--}}
                    {{--</div>--}}

                    <select class="custom-select" id="category">
                        <option selected>Choose Category</option>
                        <option id="category_id" name="category_id">Activities</option>
                        <option id="category_id" name="category_id">Local News</option>
                        <option id="category_id" name="category_id">Materials</option>
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>

        </div>
    </div>

@endsection

