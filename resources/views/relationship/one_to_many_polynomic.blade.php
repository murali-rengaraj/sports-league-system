@extends('layouts.master')

@section('content')
<div class="container w-50 mt-2">
<caption>
    <h3 class="text-center">ONE TO MANY POLYMORPHIC RELATIONSHIP</h3>
    <p class="text-center text-success">The child model Medias belongs to a many instance of Teams, Players and Matches model</p>
</caption>
<table class="table table-hover">
    <tr class="table-danger">
        <th>S/No</th>
        <th>Team Name</th>
        <th>File URL</th>
        <th>Type</th>
        <th>Table</th>
    </tr>

    @foreach ($medias->mediasMany as $media)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $medias->name }}</td>
            <td>{{ $media->file_url }}</td>
            <td>{{ $media->media_type }}</td>
            <td>{{ $media->mediable_type }}</td>
        </tr>
    @endforeach

</table>
</div>
@endsection