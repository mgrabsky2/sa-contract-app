<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Mike Grabsky",
            'email' => "mike@grabsky.com",
            'password' => Hash::make('test1234'),
        ]);
    }
}
