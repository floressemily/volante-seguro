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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();

            // Datos personales
            $table->string('nombre_completo', 150);
            $table->string('cedula', 20)->unique();
            $table->string('telefono', 20);

            // Información académica
            $table->string('tipo_licencia', 50);
            $table->string('estado', 30);

            // Fechas automáticas
            $table->timestamps();

            // Eliminación lógica (por temas legales)
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
