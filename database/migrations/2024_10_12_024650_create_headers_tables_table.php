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
        Schema::create('headers_tables', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('type_field_id')->default(1);
            $table->string('text');
            $table->string('value');
            $table->unsignedTinyInteger('sortable')->default(0);
            $table->string('width')->nullable();
            $table->unsignedTinyInteger('fixed')->default(0);
            $table->unsignedTinyInteger('alignment')->nullable();
            $table->unsignedInteger('order');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('table_id')->references('id')->on('tables');
            $table->foreign('type_field_id')->references('id')->on('type_fields');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headers_tables');
    }
};
