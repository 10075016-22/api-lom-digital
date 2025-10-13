<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            [
                'module'      => 'MODULE.HOME',
                'description' => 'Modulo principal',
                'icon'  => 'HomeIcon',
                'name'  => 'academyHome',
                'order' => 1,
            ],
            [
                'module'      => 'MODULE.USERS',
                'description' => 'Usuarios',
                'icon'  => 'UserIcon',
                'name'  => 'academyUsers',
                'order' => 2
            ],
            [
                'module'      => 'MODULE.ROLES',
                'description' => 'Roles',
                'icon'  => 'UserCircleIcon',
                'name'  => 'academyRoles',
                'order' => 3
            ],
            [
                'module'      => 'MODULE.MEDIA',
                'description' => 'Multimedia',
                'icon'  => 'VideoCameraIcon',
                'name'  => 'academyMedia',
                'order' => 4
            ],
            [
                'module'      => 'MODULE.CATEGORIES',
                'description' => 'Categorías',
                'icon'  => 'FolderIcon',
                'name'  => 'academyCategories',
                'order' => 5
            ],
        ];

        // Utiliza un bucle foreach para insertar cada conjunto de datos
        foreach ($modules as $data) {
            Module::create($data);
        }

    }
}
