<?php

namespace Database\Seeders;

use App\Models\HeadersTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryHeadersTables extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'table_id'      => 3,
                'type_field_id' => 1,
                'text'          => 'HEADERS_TABLES.ID',
                'value'         => 'id',
                'sortable'      => 1,
                'width'         => '50',
                'fixed'         => 0,
                'alignment'     => 0,
                'order'         => 1
            ],
            [
                'table_id'      => 3,
                'type_field_id' => 1,
                'text'          => 'HEADERS_TABLES.CATEGORY',
                'value'         => 'name',
                'sortable'      => 1,
                'width'         => '',
                'fixed'         => 0,
                'alignment'     => 0,
                'order'         => 2
            ],
            [
                'table_id'      => 3,
                'type_field_id' => 1,
                'text'          => 'HEADERS_TABLES.DESCRIPTION',
                'value'         => 'description',
                'sortable'      => 1,
                'width'         => '',
                'fixed'         => 0,
                'alignment'     => 0,
                'order'         => 3
            ],
            [
                'table_id'      => 3,
                'type_field_id' => 8,
                'text'          => 'HEADERS_TABLES.COLOR',
                'value'         => 'color',
                'sortable'      => 1,
                'width'         => '',
                'fixed'         => 0,
                'alignment'     => 0,
                'order'         => 4
            ],
            [
                'table_id'      => 3,
                'type_field_id' => 7,
                'text'          => 'HEADERS_TABLES.STATUS',
                'value'         => 'statusString',
                'sortable'      => 1,
                'width'         => '',
                'fixed'         => 0,
                'alignment'     => 0,
                'order'         => 5
            ],
        ];

        foreach ($data as $key => $value) {
            HeadersTable::create($value);
        }
    }
}
