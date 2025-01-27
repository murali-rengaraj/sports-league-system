<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMatchesTable extends Migration
{
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn(['match_date', 'location', 'status']);

            $table->Integer('matchinformation_id');
        });

        Schema::create('matchinformations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('match_date');
            $table->string('location');
            $table->string('status'); // ('scheduled', 'ongoing', 'completed')
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dateTime('match_date')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->nullable();

            $table->dropColumn('matchinformation_id');
        });
        Schema::dropIfExists('matchinformation');
    }
}
