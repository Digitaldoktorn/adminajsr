@extends('layouts.app')
@section('content')

    <h1>Board</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <table class="table table-striped">
        <tbody>
            @if(count($boardmembers) > 0)
                @foreach ($boardmembers as $boardmember)
                    <tr>
                        <th scope="row">{{ $boardmember->title }}</th>
                        <td>{{ $boardmember->name }}</td>
                        <td>{{ $boardmember->responsibility }}</td>
                        <td>{{ $boardmember->email }}</td>
                        <td>
                            @if(Auth::user())
                                <a href="{{ url('boardmembers/'.$boardmember->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <p>No posts found</p>
            @endif

        </tbody>
    </table>
    @if(Auth::user())
        <a class="btn btn-primary btn-sm" title="Add board member" href="{{ url('boardmembers/create') }}">Add board member</a>
    @endif
@endsection