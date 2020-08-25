<?php

use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('venues')->insert([
            'cinemaId' => 1,
            'name' => "ALTRINCHAM",
            'formatId' => 1,
            'languageId' => 1,
            'deliveryAddress' => "Denmark Street, Altrincham, WA14 2WG",
        ]);

        DB::table('venues')->insert([
            'cinemaId' => 1,
            'name' => "BEDFORD",
            'formatId' => 1,
            'languageId' => 1,
            'deliveryAddress' => "Merchant Place, Riverside Square, Bedford, MK40 1AS",
        ]);

        DB::table('venues')->insert([
            'cinemaId' => 1,
            'name' => "BRISTOL",
            'formatId' => 1,
            'languageId' => 1,
            'deliveryAddress' => "The Venue, Cribbs Causeway, Merlin Rd, Bristol, BS10 7SR",
        ]);

        DB::table('venues')->insert([
            'cinemaId' => 1,
            'name' => "BROMLEY",
            'formatId' => 1,
            'languageId' => 1,
            'deliveryAddress' => "6 St Mark's Square, Bromley BR2 9UY",
        ]);

        DB::table('venues')->insert([
            'cinemaId' => 1,
            'name' => "BURY",
            'formatId' => 1,
            'languageId' => 1,
            'deliveryAddress' => "The Rock, 9 S Back Rock, Bury,BL9 0YB",
        ]);

        DB::table('venues')->insert([
            'cinemaId' => 1,
            'name' => "CAMBERLEY",
            'formatId' => 1,
            'languageId' => 1,
            'deliveryAddress' => "The Atrium, Park Street, Camberley, Surrey, GU15 3PL",
        ]);
    }
}
