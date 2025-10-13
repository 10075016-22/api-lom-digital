<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeadersTable extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'table_id',
        'type_field_id',
        'text',
        'value',
        'sortable',
        'width',
        'fixed',
        'alignment',
        'order'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'table_id',
        'type_field_id'
    ];

    public function table() {
        return $this->belongsTo(Table::class);
    }

    public function type_field() {
        return $this->belongsTo(TypeField::class, 'type_field_id'); 
    }
}
