<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Thiago Porto',
        	'email' => 'tporto88@gmail.com',
        	'password' => Hash::make('pass')
        ]);
    }
}
