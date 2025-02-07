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
        @forelse ($players as $player)
        @php
          //$index = ($players->currentPage() - 1) * $players->perPage() + $loop->iteration
        @endphp
        <tr>
            <td>{{ $players->firstItem() + $loop->iteration - 1 }}</td>
            <td>{{ $player->name }}</td>
            <td>{{ $player->date_of_birth }}</td>
            <td>{{ $player->nationality }}</td>
            <td>{{ $player->created_at}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-danger">No Players Found...</td>
        </tr>
        @endforelse
    </table>
    {{ $players->links('pagination::bootstrap-5') }}
</div>
@endsection
