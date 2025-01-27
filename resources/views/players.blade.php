@extends('layouts.master')

@section('content')
<div class="container w-50 mt-2">
<table class="table table-hover">
    <tr class="table-info">
        <th>S/No</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Nationality</th>
        <th>Created At</th>
    </tr>

    @foreach ($rows as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->date_of_birth }}</td>
            <td>{{ $row->nationality }}</td>
            <td>{{ $row->created_at}}</td>
        </tr>
    @endforeach

</table>
</div>
@endsection