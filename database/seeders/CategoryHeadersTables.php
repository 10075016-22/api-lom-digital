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
                'table_id' => 3,
                'type_field_id' => 1,
                'text'     => 'HEADERS_TABLES.CATEGORY',
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
