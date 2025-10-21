<?php

namespace Database\Seeders;

use App\Models\GroupPermission;
use App\Models\GroupPermissionPivot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'dashboard',
                'description' => 'Permisos de dashboard'
            ],
            [
                'name' => 'usuarios',
                'description' => 'Permisos de usuarios'
            ],
            [
                'name' => 'perfil',
                'description' => 'Permisos de perfil'
            ],
            [
                'name' => 'categorias',
                'description' => 'Permisos de categorias'
            ],
            [
                'name' => 'multimedia',
                'description' => 'Permisos de multimedia'
            ]
        ];

        foreach ($data as $item) {
            GroupPermission::create($item);
        }


        // agrupar permisos por grupo
        $relations = [
            // Dashboard (ID: 1)
            ['group_permission_id' => 1, 'permission_id' => 1], // Home
            ['group_permission_id' => 1, 'permission_id' => 2], // cards-dashboard-academia
            
            // Usuarios (ID: 2)
            ['group_permission_id' => 2, 'permission_id' => 3], // menu-usuarios
            ['group_permission_id' => 2, 'permission_id' => 4], // usuarios-ver
            ['group_permission_id' => 2, 'permission_id' => 5], // usuarios-listar
            ['group_permission_id' => 2, 'permission_id' => 6], // usuarios-crear
            ['group_permission_id' => 2, 'permission_id' => 7], // usuarios-editar
            ['group_permission_id' => 2, 'permission_id' => 8], // usuarios-eliminar
            
            // Perfil (ID: 3)
            ['group_permission_id' => 3, 'permission_id' => 9], // menu-perfil
            ['group_permission_id' => 3, 'permission_id' => 10], // perfil-listar
            ['group_permission_id' => 3, 'permission_id' => 11], // perfil-ver
            ['group_permission_id' => 3, 'permission_id' => 12], // perfil-crear
            ['group_permission_id' => 3, 'permission_id' => 13], // perfil-editar
            ['group_permission_id' => 3, 'permission_id' => 14], // perfil-eliminar
            
            // Categorías (ID: 4)
            ['group_permission_id' => 4, 'permission_id' => 15], // menu-categorias
            ['group_permission_id' => 4, 'permission_id' => 16], // categorias-listar
            ['group_permission_id' => 4, 'permission_id' => 17], // categorias-ver
            ['group_permission_id' => 4, 'permission_id' => 18], // categorias-crear
            ['group_permission_id' => 4, 'permission_id' => 19], // categorias-editar
            ['group_permission_id' => 4, 'permission_id' => 20], // categorias-eliminar
            
            // Multimedia (ID: 5)
            ['group_permission_id' => 5, 'permission_id' => 21], // menu-multimedia
            ['group_permission_id' => 5, 'permission_id' => 22], // multimedia-listar
            ['group_permission_id' => 5, 'permission_id' => 23], // multimedia-ver
            ['group_permission_id' => 5, 'permission_id' => 24], // multimedia-crear
            ['group_permission_id' => 5, 'permission_id' => 25], // multimedia-editar
            ['group_permission_id' => 5, 'permission_id' => 26], // multimedia-eliminar
        ];

        // Insertar relaciones en la tabla pivot
        foreach ($relations as $relation) {
            GroupPermissionPivot::create($relation);
        }
    }
}
