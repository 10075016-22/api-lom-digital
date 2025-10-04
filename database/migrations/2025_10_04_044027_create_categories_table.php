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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre de la categoría');
            $table->string('description', 2000)->nullable()->comment('Descripción de la categoría');
            $table->string('color')->default('#222222')->comment('Color de la categoría');
            $table->unsignedTinyInteger('status')->default(1)->comment('Estado de la categoría 1: Activo, 0: Inactivo');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
