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
        $user = User::create([
            'name'      => 'Admin',
            'fullname'  => "Administrador Lom",
            'email'     => 'email@test.com',
            'password'  => Hash::make( md5('test123'))
        ]);


        $user->assignRole('SuperAdmin'); // Reemplaza 'admin' con el nombre del rol


        // creamos 50 usuarios usando el factory
        User::factory()->count(50)->create()->each(function ($user) {
            $user->assignRole('Estudiante');
        });
    }
}
