@extends('layouts.master')

@section('content')
    <div class="container w-50 mt-2">
        <caption>
            <h3 class="text-center">HAS ONE THROUGH RELATIONSHIP</h3>
            <p class="text-center text-success">Player table has one through relationship with Standing table</p>
        </caption>
        <table class="table table-hover">
            <tr class="table-danger">
                <th>S/No</th>
                <th>Name</th>
                <th>Date Of Birth</th>
                <th>Matches Played</th>
                <th>Wins</th>
                <th>Draws</th>
                <th>Losses</th>
            </tr>

            @forelse ($rows as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->date_of_birth }}</td>
                    <td>{{ $row->standing->matches_played }}</td>
                    <td>{{ $row->standing->wins }}</td>
                    <td>{{ $row->standing->draws }}</td>
                    <td>{{ $row->standing->losses }}</td>
                </tr>
            @empty
                <td colspan="7" class="text-center text-danger">Nothing Found</td>
            @endforelse

        </table>
    </div>
@endsection
