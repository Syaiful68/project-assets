<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nik' => 1231231232,
                'user_name' => 'Super-Admin',
                'user' => 'SuperApp',
                'password' => Hash::make('SuperApp'),
                'roles' => 'Admin',
                'origin_id' => 1
            ],
            [
                'nik' => 1231231232,
                'user_name' => 'Super-User',
                'user' => 'UserApp',
                'password' => Hash::make('UserApp'),
                'roles' => 'User',
                'origin_id' => 1
            ],
        ];


        foreach ($data as $key => $value) {
            # code...
            User::create($value);
        }
    }
}
