@extends('layouts.app')
@section('content')

    <h1>{{ $title }}</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Channel</th>
            <th scope="col">Responsible</th>
            <th scope="col">Information</th>
            <th scope="col">Url</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Slack</th>
            <td>Roberta Flack</td>
            <td>Slack workspace: HumanRightsFocus </td>
            <td>https://slack.com/get-started</td>
        </tr>
        <tr>
            <th scope="row">Mailinglist HRF_National</th>
            <td>Jessica Lange</td>
            <td>Contact Jessica for support</td>
            <td>---</td>
        </tr>
        <tr>
            <th scope="row">Skype</th>
            <th scope="row">Steve Seagull</th>
            <td>Skype group: HumanRightFocus</td>
            <td>https://www.skype.com/en/</td>
        </tr>
        </tbody>
    </table>


@endsection