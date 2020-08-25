<?php

use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([
            'name' => "EOS Cezanne",
            'inSeason' => 0,
            'releaseDate' => '2020-01-01',
            'length' => 90
        ]);

        DB::table('films')->insert([
            'name' => "EOS Van Gogh",
            'inSeason' => 0,
            'releaseDate' => '2020-01-01',
            'length' => 90
        ]);

        DB::table('films')->insert([
            'name' => "EOS Monet",
            'inSeason' => 0,
            'releaseDate' => '2020-01-01',
            'length' => 90
        ]);

        DB::table('films')->insert([
            'name' => "EOS Degas",
            'inSeason' => 0,
            'releaseDate' => '2020-01-01',
            'length' => 90
        ]);

        DB::table('films')->insert([
            'name' => "EOS Picasso",
            'inSeason' => 0,
            'releaseDate' => '2020-01-01',
            'length' => 90
        ]);

        DB::table('films')->insert([
            'name' => "EOS Frida Kahlo",
            'inSeason' => 1,
            'releaseDate' => '2020-10-20',
            'length' => 90
        ]);

        DB::table('films')->insert([
            'name' => "EOS Raphael Revealed",
            'inSeason' => 1,
            'releaseDate' => '2020-12-01',
            'length' => 88
        ]);

        DB::table('films')->insert([
            'name' => "EOS Cezanne: Portraits of a Life",
            'inSeason' => 1,
            'releaseDate' => '2021-02-09',
            'length' => 85
        ]);

        DB::table('films')->insert([
            'name' => "EOS Easter in Art",
            'inSeason' => 1,
            'releaseDate' => '2021-03-23',
            'length' => 85
        ]);

        DB::table('films')->insert([
            'name' => "EOS Sunflowers",
            'inSeason' => 1,
            'releaseDate' => '2021-05-18',
            'length' => 90
        ]);
    }
}
