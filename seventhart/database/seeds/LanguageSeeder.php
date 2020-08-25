<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'name' => "English",
        ]);

        DB::table('languages')->insert([
            'name' => "Dutch",
        ]);

        DB::table('languages')->insert([
            'name' => "French",
        ]);

        DB::table('languages')->insert([
            'name' => "German",
        ]);

        DB::table('languages')->insert([
            'name' => "Spanish",
        ]);
    }
}
