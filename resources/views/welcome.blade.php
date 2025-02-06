<!--
    Sports League System: if you're into sports, you can build a system to manage the teams,players, matches, scores, and standings. You may also build a public website with it.
-->

@extends('layouts.master')

@section('content')
<div class="container-fluid">
    @if(Session::has('success'))
    <div class="container w-50 mt-3">
        <div class="alert-sm alert-success text-center" style="display: block;" id="hideAlert">
            {{Session::get('success')}}
        </div>
    </div>
    @elseif (Session::has('error'))
    <div class="container w-50 mt-3">
        <div class="alert-sm alert-danger text-center" style="display: block;" id="hideAlert">
            {{Session::get('error')}}
        </div>
    </div>
    @endif
    <h1>Welcome to Co Sports</h1>
    <a href="{{ url('/players') }}" style="display: block;">Show All Players</a>
    <a href="{{ url('/teams') }}" style="display: block;">Show All Teams</a>
    <a href="{{ url('/standings') }}" style="display: block;">Show All Standings</a>

    <a href="{{ url('/player-award') }}" style="display: block;">Give Award to Player</a>

    <a href="{{ url('/mypermissions') }}" style="display: block;">Check Permission</a>

    <h4 class="alert-warning mt-5">Main Task: Event Page</h4>
    <a href="{{ route('event.index') }}" style="display: block;">Show All Events</a>
    <a href="{{ route('event.booking.form') }}" style="display: block;">Book Events</a>


    <h4 class="alert-success mt-5">Relationships</h4>
    <a href="{{ url('/oneToOne') }}" style="display: block;">One to One Relationship</a>
    <a href="{{ url('/oneToMany') }}" style="display: block;">One to Many Relationship</a>
    <a href="{{ url('/manyToMany') }}" style="display: block;">Many to Many Relationship</a>
    <a href="{{ url('/hasOneThrough') }}" style="display: block;">Has One Through</a>
    <a href="{{ url('/hasManyThrough') }}" style="display: block;">Has Many Through</a>
    <a href="{{ url('/oneToOnePolymorphic') }}" style="display: block;">One To One Polymorphic</a>
    <a href="{{ url('/oneToManyPolymorphic') }}" style="display: block;">One To Many Polymorphic</a>

    <h4 class="alert-info mt-5">Tasks</h4>
    <a href="{{ url('checkdays/1') }}" style="display: block;">Custom Middleware</a>
    <a href="{{ route('form_without_csrf') }}" style="display: block;">Form Submit Without CSRF Token</a>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hideAlert = document.getElementById('hideAlert');
        setTimeout(function() {
            hideAlert.style.display = 'none';
        }, 3000)
    });
</script>
