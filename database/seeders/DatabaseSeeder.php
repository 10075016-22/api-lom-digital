<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Confiuraciones iniciales de tablas, permisos y perfiles
            TableSeeder::class,
            HeadersTableSeeder::class,
            TypeFieldSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,

            UserSeeder::class,
            ModuleSeeder::class,

            // headers tables
            UserHeadersTables::class,
            RoleHeadersTables::class,
            CategoryHeadersTables::class,
            MediaHeadersTables::class,

            // permisos
            GroupPermissionSeeder::class,


        ]);
    }
}
