<?php

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 300);
            $table->integer('seconds')->default(0);
            $table->string('image', 2048);
        });

        // pivot table - song <-> artist
        Schema::create('artist_song', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Artist::class);
            $table->foreignIdFor(Song::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
        Schema::dropIfExists('artist_song');
    }
};
