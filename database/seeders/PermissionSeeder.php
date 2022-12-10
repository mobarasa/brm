<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            [
                'id'    => '1',
                'name' => 'user_management_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '2',
                'name' => 'permission_create',
                'guard_name' => 'web',
            ],
            [
                'id'    => '3',
                'name' => 'permission_edit',
                'guard_name' => 'web',
            ],
            [
                'id'    => '4',
                'name' => 'permission_show',
                'guard_name' => 'web',
            ],
            [
                'id'    => '5',
                'name' => 'permission_delete',
                'guard_name' => 'web',
            ],
            [
                'id'    => '6',
                'name' => 'permission_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '7',
                'name' => 'role_create',
                'guard_name' => 'web',
            ],
            [
                'id'    => '8',
                'name' => 'role_edit',
                'guard_name' => 'web',
            ],
            [
                'id'    => '9',
                'name' => 'role_show',
                'guard_name' => 'web',
            ],
            [
                'id'    => '10',
                'name' => 'role_delete',
                'guard_name' => 'web',
            ],
            [
                'id'    => '11',
                'name' => 'role_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '12',
                'name' => 'user_create',
                'guard_name' => 'web',
            ],
            [
                'id'    => '13',
                'name' => 'user_edit',
                'guard_name' => 'web',
            ],
            [
                'id'    => '14',
                'name' => 'user_delete',
                'guard_name' => 'web',
            ],
            [
                'id'    => '15',
                'name' => 'user_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '16',
                'name' => 'post_create',
                'guard_name' => 'web',
            ],
            [
                'id'    => '17',
                'name' => 'post_edit',
                'guard_name' => 'web',
            ],
            [
                'id'    => '18',
                'name' => 'post_show',
                'guard_name' => 'web',
            ],
            [
                'id'    => '19',
                'name' => 'post_delete',
                'guard_name' => 'web',
            ],
            [
                'id'    => '20',
                'name' => 'post_publish',
                'guard_name' => 'web',
            ],
            [
                'id'    => '21',
                'name' => 'post_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '22',
                'name' => 'event_create',
                'guard_name' => 'web',
            ],
            [
                'id'    => '23',
                'name' => 'event_edit',
                'guard_name' => 'web',
            ],
            [
                'id'    => '24',
                'name' => 'event_show',
                'guard_name' => 'web',
            ],
            [
                'id'    => '25',
                'name' => 'event_delete',
                'guard_name' => 'web',
            ],
            [
                'id'    => '26',
                'name' => 'event_publish',
                'guard_name' => 'web',
            ],
            [
                'id'    => '27',
                'name' => 'event_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '28',
                'name' => 'sermon_create',
                'guard_name' => 'web',
            ],
            [
                'id'    => '29',
                'name' => 'sermon_edit',
                'guard_name' => 'web',
            ],
            [
                'id'    => '30',
                'name' => 'sermon_show',
                'guard_name' => 'web',
            ],
            [
                'id'    => '31',
                'name' => 'sermon_delete',
                'guard_name' => 'web',
            ],
            [
                'id'    => '32',
                'name' => 'sermon_publish',
                'guard_name' => 'web',
            ],
            [
                'id'    => '33',
                'name' => 'sermon_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '34',
                'name' => 'category_create',
                'guard_name' => 'web',
            ],
            [
                'id'    => '35',
                'name' => 'category_edit',
                'guard_name' => 'web',
            ],
            [
                'id'    => '36',
                'name' => 'category_delete',
                'guard_name' => 'web',
            ],
            [
                'id'    => '37',
                'name' => 'category_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '38',
                'name' => 'address_create',
                'guard_name' => 'web',
            ],
            [
                'id'    => '39',
                'name' => 'address_edit',
                'guard_name' => 'web',
            ],
            [
                'id'    => '40',
                'name' => 'address_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '41',
                'name' => 'donation_create',
                'guard_name' => 'web',
            ],
            [
                'id'    => '42',
                'name' => 'donation_edit',
                'guard_name' => 'web',
            ],
            [
                'id'    => '43',
                'name' => 'donation_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '44',
                'name' => 'about_create',
                'guard_name' => 'web',
            ],
            [
                'id'    => '45',
                'name' => 'about_edit',
                'guard_name' => 'web',
            ],
            [
                'id'    => '46',
                'name' => 'about_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '47',
                'name' => 'contact_create',
                'guard_name' => 'web',
            ],
            [
                'id'    => '48',
                'name' => 'contact_edit',
                'guard_name' => 'web',
            ],
            [
                'id'    => '49',
                'name' => 'contact_show',
                'guard_name' => 'web',
            ],
            [
                'id'    => '50',
                'name' => 'contact_delete',
                'guard_name' => 'web',
            ],
            [
                'id'    => '51',
                'name' => 'contact_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '52',
                'name' => 'dashboard_access',
                'guard_name' => 'web',
            ],
            [
                'id'    => '53',
                'name' => 'setting_access',
                'guard_name' => 'web',
            ],
        ];

        Permission::insert($permissions);
    }
}
