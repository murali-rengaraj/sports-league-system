<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMatchesTable extends Migration
{
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            // $table->dropColumn(['team_id','match_date', 'location', 'status']);
            $table->dropColumn(['team_id']);
            // $table->dropColumn('matchinformation_id');
            // $table->dateTime('match_date')->nullable();
            // $table->string('location')->nullable();
            // $table->string('status')->nullable(); //('scheduled', 'ongoing', 'completed')

            $table->integer('home_team_id')->default(0);
            $table->Integer('away_team_id')->default(0);

            $table->foreignId('home_team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreignId('away_team_id')->references('id')->on('teams')->onDelete('cascade');
        });
        // Schema::dropIfExists('matchinformation');
        // Schema::create('matchinformations', function (Blueprint $table) {
        //     $table->id();
        //     $table->dateTime('match_date');
        //     $table->string('location');
        //     $table->string('status'); // ('scheduled', 'ongoing', 'completed')
        //     $table->timestamps();
        // });
    }

    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->integer('team_id')->default(0);
            $table->foreign(['home_team_id', 'away_team_id']);
            $table->dropColumn(['home_team_id', 'away_team_id']);
        });
        // Schema::table('matches', function (Blueprint $table) {
        //     $table->dateTime('match_date')->nullable();
        //     $table->string('location')->nullable();
        //     $table->string('status')->nullable();

        //     $table->dropColumn('matchinformation_id');
        // });
        // Schema::dropIfExists('matchinformation');
    }
}
