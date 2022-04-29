<?php

namespace Database\Seeders;

use App\Models\Artist;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        for($i = 0; $i < 400; $i++) {
            Artist::create([
                'name' => $faker->name(),
                'description' => $faker->text(200),
                'image' => $faker->url()
            ]);
        }
    }
}
