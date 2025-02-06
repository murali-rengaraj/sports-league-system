@extends('layouts.master')

@section('content')
<div class="container w-75 mt-2">
    <div>
        <a href="{{route('event.booking.form')}}">
            <button class="btn-sm border-0 mb-1 btn-success">Book Events</button>
        </a>
    </div>
    <table class="table table-hover">
        <tr class="table-warning">
            <th>S/No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date And Time</th>
            <th>Location</th>
            <th style="width: 120px">Ticket Price</th>
        </tr>
        @forelse ($events as $event)
        <tr>
            <td>{{ $events->firstItem() + $loop->iteration -1 }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->description }}</td>
            <td>{{ $event->date }}</td>
            <td>{{ $event->location}}</td>
            <td>&#8377;{{ $event->price}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-danger">No Events Found...</td>
        </tr>
        @endforelse
    </table>
    <div class="d-flex justify-content-center">
        {{ $events->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
