<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'Home',
                'alias' => 'Vista principal'
            ],
            [
                'name' => 'cards-dashboard-academia',
                'alias' => 'Cards del dashboard de la academia'
            ],
            // usuarios 
            [
                'name'  => 'menu-usuarios',
                'alias' => 'Menu de usuarios'
            ],
            [
                'name'  => 'usuarios-listar',
                'alias' => 'Listar usuarios'
            ],
            [
                'name'  => 'usuarios-crear',
                'alias' => 'Crear usuarios'
            ],
            [
                'name'  => 'usuarios-editar',
                'alias' => 'Editar usuarios'
            ],
            [
                'name'  => 'usuarios-eliminar',
                'alias' => 'Eliminar usuarios'
            ],
            [
                'name'  => 'menu-perfil',
                'alias' => 'Menu de perfil'
            ],
            [
                'name'  => 'perfil-listar',
                'alias' => 'Listar perfil'
            ],
            [
                'name'  => 'perfil-crear',
                'alias' => 'Crear perfil'
            ],
            [
                'name'  => 'perfil-editar',
                'alias' => 'Editar perfil'
            ],
            [
                'name'  => 'perfil-eliminar',
                'alias' => 'Eliminar perfil'
            ],
            [
                'name'  => 'menu-categorias',
                'alias' => 'Menu de categorías'
            ],
            [
                'name'  => 'categorias-listar',
                'alias' => 'Listar categorías'
            ],
            [
                'name'  => 'categorias-crear',
                'alias' => 'Crear categorías'
            ],
            [
                'name'  => 'categorias-editar',
                'alias' => 'Editar categorías'
            ],
            [
                'name'  => 'categorias-eliminar',
                'alias' => 'Eliminar categorías'
            ],
            [
                'name'  => 'menu-multimedia',
                'alias' => 'Menu de multimedia'
            ],
            [
                'name'  => 'multimedia-listar',
                'alias' => 'Listar multimedia'
            ],
            [
                'name'  => 'multimedia-crear',
                'alias' => 'Crear multimedia'
            ],
            [
                'name'  => 'multimedia-editar',
                'alias' => 'Editar multimedia'
            ],
            [
                'name'  => 'multimedia-eliminar',
                'alias' => 'Eliminar multimedia'
            ],
        ];


        // Utiliza un bucle foreach para insertar cada conjunto de datos
        foreach ($permissions as $data) {
            Permission::create($data);
        }

    }
}
