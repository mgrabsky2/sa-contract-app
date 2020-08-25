<?php

use Illuminate\Database\Seeder;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formats')->insert([
            'name' => "DCP",
        ]);

        DB::table('formats')->insert([
            'name' => "Blue Ray",
        ]);

        DB::table('formats')->insert([
            'name' => "DVD",
        ]);

        DB::table('formats')->insert([
            'name' => "MP4",
        ]);
    }
}
