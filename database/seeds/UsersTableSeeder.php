<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $password = Hash::make('Welkom0611');

        $marijn = User::create([
            'name' => 'marijn',
            'email' => 'marijn@transitlounge.one',
            'email_verified_at' => '01-01-2018',
            'password' => $password,
            'remember_token' => str_random(10),
        ]);
    }
}
