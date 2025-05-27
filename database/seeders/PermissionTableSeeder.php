<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete all existing permissions
        // Permission::query()->delete();

        // List of permissions to seed
        $permissions = [
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

           'department-list',
           'department-create',
           'department-edit',
           'department-delete',

           'achievement-list',
           'achievement-create',
           'achievement-edit',
           'achievement-delete',

           'achievement_link-list',
           'achievement_link-create',
           'achievement_link-edit',
           'achievement_link-delete',

           'achievement_media-list',
           'achievement_media-create',
           'achievement_media-edit',
           'achievement_media-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
