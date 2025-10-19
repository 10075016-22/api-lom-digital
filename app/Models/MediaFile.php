<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class MediaFile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'tags',
        'size',
        'path',
        'status'
    ];

    protected $appends = [
        'url'
    ];

    // obtener la url completa del archivo
    public function getUrlAttribute()
    {
        $path = $this->attributes['path'] ?? '';
        if ($path === '') {
            return '';
        }

        // Si el path ya es una URL absoluta, retornarlo sin cambios
        if (preg_match('/^https?:\/\//i', $path)) {
            return $path;
        }

        // Construir URL usando el disco configurado
        /** @var \Illuminate\Filesystem\FilesystemAdapter $disk */
        $disk = Storage::disk('media_files');
        return $disk->url($path);
    }

    protected $casts = [
        'status' => 'integer'
    ];

    /**
     * Relación con el usuario propietario
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con la categoría
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    /**
     * Relación many-to-many con playlists
     */
    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class, 'playlist_media_files')
                    ->withPivot('order')
                    ->withTimestamps();
    }

    /**
     * Relación con los archivos adjuntos
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(AtachmentMedia::class);
    }
}
