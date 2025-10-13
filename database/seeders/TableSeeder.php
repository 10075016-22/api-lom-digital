<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'table' => 'TABLE.USERS',
                'descripcion' => 'TABLE.USERS_DESCRIPTION',
                'endpoint' => 'users',
                'icon' => 'UserIcon'
            ],
            [
                'table' => 'TABLE.ROLES',
                'descripcion' => 'TABLE.ROLES_DESCRIPTION',
                'endpoint' => 'roles',
                'icon' => 'UserCircleIcon'
            ],
            [
                'table' => 'TABLE.CATEGORIES',
                'descripcion' => 'TABLE.CATEGORIES_DESCRIPTION',
                'endpoint' => 'categories',
                'icon' => 'FolderIcon'
            ],
            [
                'table' => 'TABLE.MEDIA_FILES',
                'descripcion' => 'TABLE.MEDIA_FILES_DESCRIPTION',
                'endpoint' => 'media-files',
                'icon' => 'VideoCameraIcon'
            ]
        ];

        foreach ($data as $key => $value) {
            Table::create($value);
        }
    }
}
