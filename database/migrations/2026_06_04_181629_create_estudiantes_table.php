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
        Schema::create('estudiantes', function (Blueprint $table) {
        $table->id(); // Clave primaria
        $table->string('nombre');
        $table->string('email')->unique();
        $table->string('matricula')->unique();
        
        // Clave foránea normalizada hacia la tabla carreras
        $table->foreignId('carrera_id')->constrained('carreras')->onDelete('cascade');
        
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
