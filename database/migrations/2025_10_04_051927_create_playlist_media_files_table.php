<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 
        Schema::create('playlist_media_files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('playlist_id')->comment('ID de la playlist');
            $table->unsignedBigInteger('media_file_id')->comment('ID del archivo multimedia');
            
            $table->integer('order')->default(0)->comment('Orden del archivo en la playlist');
            $table->timestamps();

            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('media_file_id')->references('id')->on('media_files')->onDelete('cascade')->onUpdate('cascade');
            
            // Evitar duplicados
            $table->unique(['playlist_id', 'media_file_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlist_media_files');
    }
};
