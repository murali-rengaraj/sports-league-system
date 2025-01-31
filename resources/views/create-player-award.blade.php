@extends('layouts.master')

@section('content')
<div class="container mt-5 w-50">
    <form action="{{ route('selectPlayer') }}" method="post">
        @csrf
        <label for="player" class="form-label">Select Team</label>
        <select name="" class="form-control">
            <option value="">Select Team</option>
            @foreach ( $teams as $team )
                <option value="{{ $team->id }}"> {{ $team->name }}</option>
            @endforeach
        </select>

        <label for="player" class="form-label">Select Player</label>
        <select name="" class="form-control">
            <option value="">Select Player</option>
            @foreach ( $players as $player )
                <option value="{{ $player->id }}"> {{ $player->name }}</option>
            @endforeach
        </select>
    </form>
</div>
@endsection