<?php

namespace Database\Seeders;

use App\Models\HeadersTable;
use Illuminate\Database\Seeder;

class RoleHeadersTables extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'table_id' => 2,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.ROLE',
                'value'    => 'name',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 1
            ],
        ];

        foreach ($data as $key => $value) {
            HeadersTable::create($value);
        }
    }
}
