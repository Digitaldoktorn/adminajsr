@extends('layouts.app')
@section('content')

    <h1>Create Post</h1>

    {{--placera denna i controllern istället--}}
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
                    <input id="title" class="form-control" type="text" name="title" placeholder="Max 100 characters" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" class="form-control" rows="5" name="content" placeholder="Max 300 characters" value="{{ old('content') }}"></textarea>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>

                    <select class="custom-select" id="category" type="text" name="category_id">
                        <option value="" disabled selected>Choose Category</option>
                        @foreach ($categories as $category)
                            <option id="category_id" value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{--Only admin access - nedanstående kommer ej att funka, man kan inte ha en form i en form--}}
                {{--@if(Auth::user()->roles->whereIn('id', 1)->first())--}}
                {{--<div class="form-group">--}}
                    {{--<form action="upload.php" method="post" enctype="multipart/form-data">--}}
                        {{--Select file to upload (for "Materials" category only):<br><br>--}}
                        {{--<input type="file" name="fileToUpload" id="fileToUpload">--}}
                        {{--<input type="submit" value="Upload file" name="submit">--}}
                    {{--</form>--}}
                {{--</div>--}}
                {{--@endif--}}
                {{--<br>--}}

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

@endsection

