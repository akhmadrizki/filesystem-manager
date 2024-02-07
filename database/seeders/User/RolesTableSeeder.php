<?php

namespace Database\Seeders\User;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Role Types
         *
         */
        $RoleItems = [
            [
                'name'        => 'Super Admin',
                'slug'        => 'superadmin',
                'description' => 'Super Admin Role',
                'level'       => 1,
            ],
            [
                'name'        => 'Admin',
                'slug'        => 'admin',
                'description' => 'Admin Role',
                'level'       => 1,
            ],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($RoleItems as $RoleItem) {
            $newRoleItem = config('roles.models.role')::where('slug', '=', $RoleItem['slug'])->first();

            if ($newRoleItem === null) {
                $newRoleItem = config('roles.models.role')::create([
                    'name'        => $RoleItem['name'],
                    'slug'        => $RoleItem['slug'],
                    'description' => $RoleItem['description'],
                    'level'       => $RoleItem['level'],
                ]);
            }
        }
    }
}
