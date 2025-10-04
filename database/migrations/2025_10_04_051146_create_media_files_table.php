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
        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            // Usuario que sube el archivo
            $table->unsignedBigInteger('user_id')->comment('Usuario que sube el archivo');
            // Categoría del archivo
            $table->unsignedBigInteger('category_id')->comment('Categoría del archivo');

            $table->string('title')->comment('Título del archivo - video, imagen, etc.');
            $table->text('description')->nullable()->comment('Descripción libre del archivo');

            $table->string('tags', 2000)->nullable()->comment('Tags del archivo');
            $table->string('size')->comment('Tamaño del archivo');
            $table->string('path')->comment('Ruta del archivo - dentro de la storage');
                        
            $table->unsignedTinyInteger('status')->default(1)->comment('Estado del archivo 1: Activo, 0: Inactivo');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_files');
    }
};
