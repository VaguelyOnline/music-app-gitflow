<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Song;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        for ($i=0; $i < 500; $i++)
            Song::create([
                'name' => $faker->words(rand(1, 4), true),
                'seconds' => rand(120, 300),
                'image' => $faker->url()
            ]);

        $artists = Artist::all();
        

        // Assign at least one artist, to each song in the Database
        foreach(Song::all() as $song) {
            // link this song, to a random set of artists
            $randomArtists = $artists->random(rand(1, 3));

            foreach($randomArtists as $artist) {
                $artist->songs()->attach($song->id);
            }
        }
    }
}
