@extends('layouts.master')

@section("head")
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container mt-5 w-50">
    @if(Session::has('success'))
    <div class="alert-sm alert-success text-center" style="display: block;" id="hideAlertForAward">
        {{Session::get('success')}}
    </div>
    @endif

    @if ($errors->any())
        <div class="alery-sm alert-danger py-1 text-center" id="hideAlertForAward">
            Please Fill All the Fields..
        </div>
    @endif

    <form action="{{ route('awardPlayer') }}" method="post">
        @csrf
        <label for="selectAward" class="form-label"><b>Select Award :</b></label>
        <select name="award_id" id="selectAward" class="form-control">
            <option value="">Select Award</option>
            @foreach ( $awards as $award )
            <option value="{{ $award->id }}"
            @if (old('award_id') == $award->id) selected @endif >
            {{ $award->name }}</option>
            @endforeach
        </select>


        <label for="selectTeam" class="form-label"><b>Select Team :</b></label>
        <select name="team_id" id="selectTeam" class="form-control">
            <option value="">Select Team</option>
            @foreach ( $teams as $team )
            <option value="{{ $team->id }}">
            {{ $team->name }}</option>
            @endforeach
        </select>

        <label for="player" class="form-label"><b>Select Player :</b></label>
        <select name="player_id" id="playersOfTeam" class="form-control" disabled>
            <option value="">Select Player</option>
        </select>

        <input type="submit" value="Submit" class="form-control btn btn-primary mt-3">
    </form>
</div>

<script>
    $(document).ready(function() {
        $("#selectTeam").change(function() {
            let teamId = $(this).val();
            // alert(teamId);
            if (teamId) {
                $.ajax({
                    url: '/player-award',
                    type: 'POST',
                    data: {
                        id: teamId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        console.log(response.players.length);

                        if(response.players.length>0){
                            $("#playersOfTeam").empty().append('<option value="">Select Player</option>');

                            $.each(response.players, function(key, player) {
                            $("#playersOfTeam").append(`<option value="${player.id}">${player.name}</option>`);
                            });
                            $("#playersOfTeam").prop("disabled", false);
                        }else{
                            $("#playersOfTeam").empty().append('<option value="">No Players</option>');
                            $("#playersOfTeam").prop("disabled", false);
                        }
                    },
                    error: function() {
                        alert("Error loading players");
                    }
                });
            } else {
                $("#playersOfTeam").empty().append('<option value="">Select Player</option>').prop("disabled", true);
            }
        });

        setTimeout(() => {
            $("#hideAlertForAward").css("display", "none");
        }, 3000);
    });
</script>
@endsection
