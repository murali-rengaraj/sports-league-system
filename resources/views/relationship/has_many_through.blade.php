@extends('layouts.master')

@section('content')
<div class="container w-50 mt-2">
    <caption>
        <h3 class="text-center">HAS MANY THROUGH RELATIONSHIP</h3>
        <p class="text-center text-success">Players table has many through relationship with Matches table</p>
    </caption>
    <table class="table table-hover">
        <tr class="table-danger">
            <th>S/No</th>
            <th>Player Name</th>
            <th>Player DOB</th>
            <th>Match Date</th>
            <th>Location</th>
            <th>Status</th>
        </tr>
        @php
            $i=1;
        @endphp
        @foreach ($rows as $row)
        @foreach ($row->matches as $match)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->date_of_birth }}</td>
            <td>{{ $match->match_date }}</td>
            <td>{{ $match->location }}</td>
            <td>{{ $match->status }}</td>
        </tr>
            @endforeach
        @endforeach

    </table>
</div>
@endsection