@extends('layouts.app')

@section('content')

<h1>{{ $title }}</h1>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Name</th>
        <th scope="col">Resonsibility</th>
        <th scope="col">Email address</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Chairman</th>
        <td>Mark Johnson</td>
        <td>Overall coordination</td>
        <td>mark@johnson.com</td>
    </tr>
    <tr>
        <th scope="row">Vice chairman</th>
        <td>Jacob Thornton</td>
        <td>Media</td>
        <td>jacob@thornton.com</td>
    </tr>
    <tr>
        <th scope="row">Assistant</th>
        <td>Larry Bird</td>
        <td>Documentation, administration</td>
        <td>larry@bird.com</td>
    </tr>
    </tbody>
</table>
@endsection