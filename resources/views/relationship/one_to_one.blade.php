@extends('layouts.master')

@section('content')
<div class="container w-50 mt-2">
<caption>
    <h3 class="text-center">ONE TO ONE RELATIONSHIP</h3>
    <p class="text-center text-success">Team table has one to one relationship with Standing table</p>
</caption>
<table class="table table-hover">
    <tr class="table-danger">
        <th>S/No</th>
        <th>Name</th>
        <th>City</th>
        <th>Matches Played</th>
        <th>Wins</th>
        <th>Draws</th>
        <th>Losses</th>
    </tr>

    @foreach ($rows as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->city }}</td>
            <td>{{ $row->standing->matches_played }}</td>
            <td>{{ $row->standing->wins}}</td>
            <td>{{ $row->standing->draws}}</td>
            <td>{{ $row->standing->losses}}</td>
        </tr>
    @endforeach

</table>
</div>
@endsection