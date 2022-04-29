<?php

use App\Models\Playlist;
use Faker\Generator;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Http;
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
        Schema::table('playlists', function (Blueprint $table) {
            $table->string('subtitle', 100)->nullable();
        });

        $faker = app(Generator::class);

        foreach(Playlist::all() as $playlist)
        {
            $playlist->update([
                'subtitle' => $faker->words(rand(2, 4), true)
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('playlists', function (Blueprint $table) {
            $table->dropColumn('subtitle');
        });
    }
};
