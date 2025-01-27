<!-- 
    Sports League System: if you're into sports, you can build a system to manage the teams,players, matches, scores, and standings. You may also build a public website with it. 
-->

@extends('layouts.master')

@section('content')
<h1>Welcome to Co Sports</h1>
<a href="{{ url('/players') }}" style="display: block;">Show All Players</a>
<a href="{{ url('/teams') }}" style="display: block;">Show All Teams</a>
<a href="{{ url('/standings') }}" style="display: block;">Show All Standings</a>


<a href="{{ url('/oneToOne') }}" style="display: block;">One to One Relationship</a>
<a href="{{ url('/oneToMany') }}" style="display: block;">One to Many Relationship</a>
@endsection