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
                'value'    => 'title',
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
                'value'    => 'categoryName',
                'sortable' => 1,
                'width'    => '200',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 2
            ],
            [
                'table_id' => 4,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.USER_CREATED',
                'value'    => 'userName',
                'sortable' => 1,
                'width'    => '200',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 3
            ],
            [
                'table_id' => 4,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.TAGS',
                'value'    => 'tags',
                'sortable' => 1,
                'width'    => '200',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 4
            ],
            [
                'table_id' => 4,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.SIZE',
                'value'    => 'size',
                'sortable' => 1,
                'width'    => '200',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 5
            ],
            [
                'table_id'      => 4,
                'type_field_id' => 4,
                'text'          => 'HEADERS_TABLES.PATH',
                'value'         => 'path',
                'sortable'      => 1,
                'width'         => '200',
                'fixed'         => 0,
                'alignment'     => 0,
                'order'         => 6
            ],
            [
                'table_id' => 4,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.DESCRIPTION',
                'value'    => 'description',
                'sortable' => 1,
                'width'    => '',
                'fixed'    => 0,
                'alignment' => 0,
                'order'     => 7
            ],
            [
                'table_id' => 4,
                'type_field_id' => 7,
                'text'      => 'HEADERS_TABLES.STATUS',
                'value'     => 'statusString',
                'sortable'  => 1,
                'width'     => '200',
                'fixed'     => 0,
                'alignment' => 0,
                'order'     => 8
            ],
        ];

        foreach ($data as $key => $value) {
            HeadersTable::create($value);
        }
    }
}
