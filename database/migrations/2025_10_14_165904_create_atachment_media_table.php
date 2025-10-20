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
        Schema::create('atachment_media', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('media_file_id')->comment('ID del archivo multimedia');
            $table->string('title')->comment('Título del archivo adjunto');
            $table->string('description')->comment('Descripción del archivo adjunto');
            $table->string('path')->comment('Ruta del archivo adjunto link o storage local');
            $table->string('type')->comment('Tipo de archivo adjunto file o link');
            $table->unsignedTinyInteger('status')->default(1)->comment('Estado del archivo adjunto 1: Activo, 0: Inactivo');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('media_file_id')->references('id')->on('media_files')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atachment_media');
    }
};
