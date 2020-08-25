<?php

use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cinemas')->insert([
            'name' => "Vue",
            'contact' => "Mike Grabsky",
            'email' => "mike@grabsky.com",
        ]);
    }
}
