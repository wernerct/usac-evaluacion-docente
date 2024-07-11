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
        Schema::create('evaluacion_docentes', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->string('archivo');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->dateTime('fecha_carga', precision: 0);
            $table->boolean('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacion_docentes');
    }
};
