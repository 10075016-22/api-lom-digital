<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtachmentMedia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'media_file_id',
        'title',
        'description',
        'path',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'media_file_id'
    ];

    public function mediaFile() {
        return $this->belongsTo(MediaFile::class);
    }
}
