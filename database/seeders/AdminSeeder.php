<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = 
            [
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('anasnay2000'),
                'role_id' => 3
            ];

        DB::table('users')->insert($user);
    }
}
