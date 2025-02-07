@extends('layouts.master')

@section('title')
    Soft Delete
@endsection

@section('content')
<div class="container w-50 mt-2">
    <table class="table table-hover">
            <h3 class="text-center text-info">All Players (Only trash)</h3>
            <tr class="table-warning">
                <th>S/No</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Nationality</th>
                <th>Deleted At</th>
            </tr>
            @forelse ($playersOnlyTrash as $player)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->date_of_birth }}</td>
                    <td>{{ $player->nationality }}</td>
                    <td>{{ $player->deleted_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-danger">No Players Found...</td>
                </tr>
            @endforelse
        </table>
    </div>
    <div class="container w-50 mt-2">
        <h3 class="text-center text-warning">All Players (without trash)</h3>
        <table class="table table-hover">
            <tr class="table-info">
                <th>S/No</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Nationality</th>
                <th>Created At</th>
            </tr>
            @forelse ($playersWithoutTrash as $player)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->date_of_birth }}</td>
                    <td>{{ $player->nationality }}</td>
                    <td>{{ $player->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-danger">No Players Found...</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
