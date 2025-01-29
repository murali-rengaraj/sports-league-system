@extends('layouts.master')

@section('content')
<div class="container w-50 mt-2">
    <caption>
        <h3 class="text-center">ONE TO MANY RELATIONSHIP</h3>
        <p class="text-center text-success">Team table has one to many relationship with Player table</p>
    </caption>
    <table class="table table-hover">
        @foreach ($rows as $row)
        <tr class="table-danger">
            <th colspan="4">{{ $row->name }}</th>
        </tr>
        {{-- count($row->player) --}}
        @if (count($row->player) < 1)
        <tr class="table-warning">
            <td colspan="4" class="text-center">No Players Found</td>
        </tr>
            @continue
        @endif
        <tr class="table-info">
            <th>S/No</th>
            <th>Player Name</th>
            <th>Date of Birth</th>
            <th>Nationality</th>
        </tr>
            @foreach ($row->player as $player)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $player->name ?? '' }}</td>
                    <td>{{ $player->date_of_birth ?? '' }}</td>
                    <td>{{ $player->nationality ?? '' }}</td>
                </tr>
            @endforeach
        <tr>
        @endforeach
    </table>
</div>
@endsection