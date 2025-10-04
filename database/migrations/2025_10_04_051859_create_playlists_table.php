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
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->comment('Usuario propietario de la playlist');
            
            $table->string('name')->comment('Nombre de la playlist');
            $table->text('description')->nullable()->comment('Descripción de la playlist');
            $table->string('thumbnail')->nullable()->comment('Imagen de portada de la playlist');
            $table->unsignedTinyInteger('status')->default(1)->comment('Estado de la playlist 1: Activa, 0: Inactiva');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlists');
    }
};
