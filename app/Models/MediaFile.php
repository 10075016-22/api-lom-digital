<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
}
