<?php

namespace Database\Seeders;

use App\Models\HeadersTable;
use Illuminate\Database\Seeder;

class UserHeadersTables extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // users headers
        $data = [
            [
                'table_id' => 1,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.USER',
                'value'    => 'name',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 1
            ],
            [
                'table_id' => 1,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.NAME_USER',
                'value'    => 'fullname',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 2
            ],
            [
                'table_id' => 1,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.EMAIL',
                'value'    => 'email',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 3
            ],
            [
                'table_id' => 1,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.ROLE',
                'value'    => 'role',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 4
            ],
            [
                'table_id' => 1,
                'type_field_id' => 7,
                'text'     => 'HEADERS_TABLES.STATUS',
                'value'    => 'status',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 5
            ],
            
        ];

        foreach ($data as $key => $value) {
            HeadersTable::create($value);
        }
    }
}
