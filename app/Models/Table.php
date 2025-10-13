<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'table',
        'descripcion',
        'endpoint',
        'icon'
    ];

    protected $hidden = ['deleted_at'];
}
