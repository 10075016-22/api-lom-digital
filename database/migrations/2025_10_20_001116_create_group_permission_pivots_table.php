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
        Schema::create('group_permission_pivots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_permission_id');
            $table->unsignedBigInteger('permission_id');
            $table->timestamps();

            $table->foreign('group_permission_id')->references('id')->on('group_permissions')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_permission_pivots');
    }
};
