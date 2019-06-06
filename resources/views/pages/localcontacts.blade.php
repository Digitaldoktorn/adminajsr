@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">City</th>
            <th scope="col">Name</th>
            <th scope="col">Local office</th>
            <th scope="col">Meetings</th>
            <th scope="col">Email address</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">London</th>
            <td>Roberta Flack</td>
            <td>Main st 123</td>
            <td>Wednesdays 6-8 pm</td>
            <td>roberta@flack.com</td>
        </tr>
        <tr>
            <th scope="row">Birmingham</th>
            <td>Jessica Lange</td>
            <td>Queens st 123</td>
            <td>Mondays 6-8 pm</td>
            <td>jessica@lange.com</td>
        </tr>
        <tr>
            <th scope="row">Southampton</th>
            <td>Grace Kelly</td>
            <td>Kings st 123</td>
            <td>Thursdays 7-8.30 pm</td>
            <td>grace@kelly.com</td>
        </tr>
        <tr>
            <th scope="row">Liverpool</th>
            <td>Steven Seagull</td>
            <td>Boring st 123</td>
            <td>Wednesdays 6-8 pm</td>
            <td>steve@steve.com</td>
        </tr>
        <tr>
            <th scope="row">Bristol</th>
            <td>John Cleese</td>
            <td>Funny st 123</td>
            <td>Mondays 7-8 pm</td>
            <td>john@john.com</td>
        </tr>
        <tr>
            <th scope="row">Manchester</th>
            <td>Robbie Robertson</td>
            <td>Plums st 123</td>
            <td>Tuesdays 7-8.30 pm</td>
            <td>robbie@robbie.com</td>
        </tr>
        </tbody>
    </table>
@endsection