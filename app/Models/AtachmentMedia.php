<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

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

    protected $appends = [
        'url'
    ];

    public function mediaFile() {
        return $this->belongsTo(MediaFile::class);
    }

    public function getUrlAttribute()
    {
        $path = $this->attributes['path'] ?? '';

        if ($path === '') {
            return '';
        }

        // Si ya es un enlace absoluto, retornarlo tal cual
        if (preg_match('/^https?:\/\//i', $path)) {
            return $path;
        }

        // Caso contrario, construir la URL usando la configuración del disco
        $baseUrl = config('filesystems.disks.media_files.url');
        if (is_string($baseUrl) && $baseUrl !== '') {
            return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
        }

        // Si no hay URL configurada, retornar el path tal cual (fallback)
        return $path;
    }
}
