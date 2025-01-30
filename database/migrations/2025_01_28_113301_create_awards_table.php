<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('award_player',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('award_id');
            $table->unsignedBigInteger('player_id');
            $table->timestamps();

            $table->foreignId('award_id')->references('id')->on('awards')->onDelete('cascade');
            $table->foreignId('player_id')->references('id')->on('players')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awards');
        Schema::dropIfExists('award_player');
    }
};
