@extends('layouts.app')

@section('content')

    {{--Greeting logged in user, see code in AppServiceProvider--}}
    <h1>Welcome {{ $auth->name }}!</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque eligendi expedita illum numquam provident sapiente sint ullam. Ex illum laudantium mollitia optio perspiciatis! A accusamus dolore, laudantium minima nam quia.</p>
    <hr>
    <h3>Updates</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores corporis error fugiat laudantium maiores provident quod sint voluptatum. Aspernatur distinctio earum eveniet laboriosam molestiae nesciunt, nulla perspiciatis rerum sapiente voluptates.</p>


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
