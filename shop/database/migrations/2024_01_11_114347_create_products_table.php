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
        // Verifica si la tabla existe antes de intentar crearla
        
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('nombre')->unique();
                $table->string('color');
                $table->string('foto');
                $table->integer('stock');
                $table->integer('precio');
                $table->integer('ventas');
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Elimina la tabla si existe
        Schema::dropIfExists('products');
    }
};
