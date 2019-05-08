@extends('layouts.app')

@section('content')

{{--Greeting logged in user, see code in AppServiceProvider--}}
<h1>Welcome {{ $auth->name }}!</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque eligendi expedita illum numquam provident sapiente sint ullam. Ex illum laudantium mollitia optio perspiciatis! A accusamus dolore, laudantium minima nam quia.</p>
<hr>
            <h3>Updates</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores corporis error fugiat laudantium maiores provident quod sint voluptatum. Aspernatur distinctio earum eveniet laboriosam molestiae nesciunt, nulla perspiciatis rerum sapiente voluptates.</p>


            <table class="table table-striped">
                <tr>
                    <td><a href="#">{{'Title 1'}}</a></td>
                </tr>                    <tr>
                    <td><a href="#">{{'Title 2'}}</a></td>
                </tr>                    <tr>
                    <td><a href="#">{{'Title 3'}}</a></td>
                </tr>
                <tr>
                    <td><a href="">{{'Title 4'}}</a></td>
                </tr>                <tr>
                    <td><a href="">{{'Title 5'}}</a></td>
                </tr>
            </table>

            {{--Laracast--}}
            {{--<ul>--}}
                {{--@foreach ($tasks as $task)--}}
                    {{--<li>{{ $task }} </li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}


        {{--testar att få in posts home-sidan - funkar ej--}}
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ url('posts/'.$post->id) }}">{{ $post->title }}</a></h5>
                            <p class="card-text">{{ $post->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

@endsection
