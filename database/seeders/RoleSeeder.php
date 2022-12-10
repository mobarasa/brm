<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'        => 1,
                'name'      => 'Super-Admin',
                'guard_name' => 'web',
            ],
            [
                'id'        => 2,
                'name'      => 'Administrator',
                'guard_name' => 'web',
            ],
            [
                'id'        => 3,
                'name'      => 'Pastor',
                'guard_name' => 'web',
            ],
        ];

        Role::insert($roles);
    }
}
