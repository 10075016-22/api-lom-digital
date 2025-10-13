<?php

namespace Database\Seeders;

use App\Models\HeadersTable;
use Illuminate\Database\Seeder;

class MediaHeadersTables extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'table_id' => 4,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.NAME',
                'value'    => 'name',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 1
            ],
            [
                'table_id' => 4,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.CATEGORY',
                'value'    => 'name',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 2
            ],
            [
                'table_id' => 4,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.USER_CREATED',
                'value'    => 'name',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 3
            ],
            [
                'table_id' => 4,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.TAGS',
                'value'    => 'name',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 4
            ],
            [
                'table_id' => 4,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.SIZE',
                'value'    => 'name',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 5
            ],
            [
                'table_id' => 4,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.PATH',
                'value'    => 'name',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 6
            ],
            [
                'table_id' => 4,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.DESCRIPTION',
                'value'    => 'name',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 7
            ],
            [
                'table_id' => 4,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.STATUS',
                'value'    => 'name',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 8
            ],
        ];

        foreach ($data as $key => $value) {
            HeadersTable::create($value);
        }
    }
}
