<?php

namespace Database\Seeders\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard(); // Disable mass assignment

        $this->call([
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            ConnectRelationshipsSeeder::class,
            UsersTableSeeder::class,
        ]);

        Model::reguard(); // Enable mass assignment
    }
}
