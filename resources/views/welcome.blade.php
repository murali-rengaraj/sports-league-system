<!-- 
    Sports League System: if you're into sports, you can build a system to manage the teams,players, matches, scores, and standings. You may also build a public website with it. 
-->

@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1>Welcome to Co Sports</h1>
    <a href="{{ url('/players') }}" style="display: block;">Show All Players</a>
    <a href="{{ url('/teams') }}" style="display: block;">Show All Teams</a>
    <a href="{{ url('/standings') }}" style="display: block;">Show All Standings</a>

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