<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.cl',
                'password' => Hash::make('123456789'),
                'role_id' => 1, // Rol admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'email' => 'user@user.cl',
                'password' => Hash::make('123456789'),
                'role_id' => 2, // Rol user
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
