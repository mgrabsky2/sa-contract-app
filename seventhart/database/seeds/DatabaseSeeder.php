<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(FormatSeeder::class);
         $this->call(LanguageSeeder::class);
         $this->call(CinemaSeeder::class);
         $this->call(VenueSeeder::class);
         $this->call(FilmSeeder::class);
    }
}
