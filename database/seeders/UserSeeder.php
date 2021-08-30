<?php

namespace Database\Seeders;
use App\Models\User;

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
        User::create([
            'first_name' => 'Conor',
            'last_name' => 'McGregor',
            'user_name' => 'username',
            'email' => 'email@example.com',
            'password' =>'qweasdzxc'
        ]);
    }
}
