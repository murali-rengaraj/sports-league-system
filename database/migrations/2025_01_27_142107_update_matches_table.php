<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMatchesTable extends Migration
{
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {

            $table->foreignId('home_team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreignId('away_team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            if (Schema::hasColumn('matches', 'home_team_id')) {
                $table->dropForeign(['home_team_id']);
                $table->dropColumn('home_team_id');
            }
            if (Schema::hasColumn('matches', 'away_team_id')) {
                $table->dropForeign(['away_team_id']);
                $table->dropColumn('away_team_id');
            }
        });
    }
}
