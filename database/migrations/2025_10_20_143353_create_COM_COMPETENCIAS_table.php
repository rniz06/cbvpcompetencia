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
        Schema::create('competencia.COM_COMPETENCIAS', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_id')->nullable()->constrained('competencia.COM_TIPOS')->cascadeOnUpdate()->onDelete('set null');
            $table->dateTime('fecha_hora_inicio');
            $table->dateTime('fecha_hora_fin');
            $table->bigInteger('duracion_segundos')->nullable();
            $table->foreignId('creadoPor')->nullable()->constrained('public.users')->cascadeOnUpdate()->onDelete('set null');
            $table->foreignId('actualizadoPor')->nullable()->constrained('public.users')->cascadeOnUpdate()->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competencia.COM_COMPETENCIAS');
    }
};
