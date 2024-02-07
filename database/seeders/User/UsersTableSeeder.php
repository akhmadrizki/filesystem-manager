<?php

namespace Database\Seeders\User;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole   = config('roles.models.role')::where('slug', '=', 'superadmin')->first();
        $permissions = config('roles.models.permission')::all();

        $newUser = config('roles.models.defaultUser')::firstOrCreate([
            'email' => 'demo@timedoor.net',
        ], [
            'name'              => 'Timedoor Indonesia',
            'password'          => 'demo123', // store deault password in .env for real project
            'email_verified_at' => now(),
        ]);

        $newUser->attachRole($adminRole);

        foreach ($permissions as $permission) {
            $newUser->attachPermission($permission);
        }
    }
}
