<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'first_name' => 'Conor',
            'last_name' => 'McGregor',
            'user_name' => 'username',
            'email' => 'email@example.com',
            'password' => Hash::make('qweasdzxc')
        ]);
    }
}
