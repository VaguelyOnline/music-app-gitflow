<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\Song;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $user = User::first();

        for($i = 0; $i < 100; $i++)
        {
            $user->playlists()->create([
                'name' => $faker->words(2, true),
                'image' => $this->getImage()
            ]);
        }

        $songs = Song::all();
        foreach(Playlist::all() as $playlist)
            $this->addSongsToPlaylist($playlist, $songs);

    }

    private function addSongsToPlaylist(Playlist $playlist, $songs) {
        $songsToAttach = $songs->random(rand(5, 20));
        
        // all in one go - destructive
        $playlist->songs()->sync($songsToAttach);

        // // one at a time - additive operation. Does not change the existing songs - adds to them
        // foreach($songsToAttach as $song)
        //     $playlist->songs()->attach($song);
    }

    private function getImage() {
        $images = [
            'http://localhost:8000/images/your-episodes.png',
            'http://localhost:8000/images/live-forever.png',
            'https://i.scdn.co/image/ab67616d0000b2733804f59392452edd9c2b46b8',
            'https://i.scdn.co/image/ab67616d0000b2737282412ad025c14f7039f516',
            'https://mosaic.scdn.co/640/ab67616d0000b273164edf20ddc765dff82d95cdab67616d0000b27321d6c05fca73459518ad0731ab67616d0000b2738f5636c9f7c8e432f81fe29aab67616d0000b273a26cbcb0de79a523e83a6b1d',
            'https://i.scdn.co/image/ab67706c0000bebb4f7148535931afae1fce3681',
            'https://mosaic.scdn.co/640/ab67616d0000b27326ee43659ded2ab2d73566e2ab67616d0000b273417b2d21ee4149114063220bab67616d0000b27357d3d629e987c214329e0e8aab67616d0000b273c2decdb0e3ad934ad512abdd'
        ];
        // return image 0 - 6
        return $images[rand(0, count($images) - 1)];
    }
}
