<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users = [
            [
                'id'             => 1,
                'name'           => 'System Administrator',
                'gender'         => 'Male',
                'email'          => 'sysadmin@gmail.com',
                'phone_number'   => '0723000000',
                'position'       => 'Sysadmin',
                'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Main Administrator',
                'gender'         => 'Male',
                'email'          => 'admin@gmail.com',
                'phone_number'   => '0723000001',
                'position'       => 'Administrator',
                'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Main User',
                'gender'         => 'Female',
                'email'          => 'user@gmail.com',
                'phone_number'   => '0723000002',
                'position'       => 'Pastor',
                'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
