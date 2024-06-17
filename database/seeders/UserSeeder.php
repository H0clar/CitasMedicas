<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Admin',
            'email' => 'admin@admin.cl',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'role_id' => 1, // Asumiendo que el role_id para el administrador es 1
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('users')->updateOrInsert(
            ['email' => $user['email']],
            $user
        );
    }
}
