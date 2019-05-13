@extends('layouts.app')
@section('content')

    <h1>{{ $title }}</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Domain name</th>
            <th scope="col">Responsible</th>
            <th scope="col">Registrar</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">humanrightsfocus.org</th>
            <td>Melanie Johnson</td>
            <td>Namecheap</td>
        </tr>
        <tr>
            <th scope="row">hrf-london.org</th>
            <td>Jessica Lange</td>
            <td>Bluehost</td>
        </tr>
        <tr>
            <th scope="row">hrf-birmingham.org</th>
            <th scope="row">Steve Seagull</th>
            <td>Bluehost</td>
        </tr>
        </tbody>
    </table>


@endsection