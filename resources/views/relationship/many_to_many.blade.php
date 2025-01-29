@extends('layouts.master')

@section('content')
<div class="container w-50 mt-2">
    <caption>
        <h3 class="text-center">MANY TO MANY RELATIONSHIP</h3>
        <p class="text-center text-success">Players table has many to many relationship with Awards table</p>
    </caption>
    <table class="table table-hover">
        <tr class="table-danger">
            <th>S/No</th>
            <th>Player Name</th>
            <th>Award Name</th>
        </tr>
        @php
            $i=1;
        @endphp
        @foreach ($rows as $row)
            @foreach ($row->awards as $award)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $award->name }}</td>
        </tr>
            @endforeach
        @endforeach

    </table>
</div>
@endsection