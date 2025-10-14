<?php

namespace Database\Seeders;

use App\Models\TypeField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'        => 'FIELD_TEXT',
                'description' => 'Campo tipo texto'
            ],
            [
                'name'        => 'FIELD_NUMBER',
                'description' => 'Campo tipo numero'
            ],
            [
                'name'        => 'FIELD_DATE',
                'description' => 'Campo tipo fecha'
            ],
            [
                'name'        => 'FIELD_LINK',
                'description' => 'Campo tipo link'
            ],
            [
                'name'        => 'FIELD_IMAGE',
                'description' => 'Campo tipo imagen'
            ],
            [
                'name'        => 'FIELD_TAGS',
                'description' => 'Campo tipo tags'
            ],
            [
                'name'        => 'FIELD_STATUS',
                'description' => 'Campo tipo status'
            ],
            [
                'name'        => 'FIELD_COLOR',
                'description' => 'Campo tipo color'
            ]
        ];

        foreach ($data as $key => $value) {
            TypeField::create($value);
        }
    }
}
