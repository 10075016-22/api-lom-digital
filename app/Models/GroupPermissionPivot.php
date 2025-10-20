<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPermissionPivot extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_permission_id',
        'permission_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'group_permission_id',
        'permission_id'
    ];
}
