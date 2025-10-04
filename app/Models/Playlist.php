<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Playlist extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'thumbnail',
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
     * Relación many-to-many con media_files
     */
    public function mediaFiles(): BelongsToMany
    {
        return $this->belongsToMany(MediaFile::class, 'playlist_media_files')
                    ->withPivot('order')
                    ->withTimestamps()
                    ->orderBy('playlist_media_files.order');
    }

    /**
     * Agregar un archivo a la playlist
     */
    public function addMediaFile(MediaFile $mediaFile, int $order = null): void
    {
        if ($order === null) {
            $order = $this->mediaFiles()->count();
        }

        $this->mediaFiles()->attach($mediaFile->id, ['order' => $order]);
    }

    /**
     * Remover un archivo de la playlist
     */
    public function removeMediaFile(MediaFile $mediaFile): void
    {
        $this->mediaFiles()->detach($mediaFile->id);
    }

    /**
     * Reordenar archivos en la playlist
     */
    public function reorderMediaFiles(array $mediaFileIds): void
    {
        foreach ($mediaFileIds as $order => $mediaFileId) {
            $this->mediaFiles()->updateExistingPivot($mediaFileId, ['order' => $order]);
        }
    }
}
