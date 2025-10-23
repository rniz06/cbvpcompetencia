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
        Schema::create('competencia.COM_CONCURSANTES', function (Blueprint $table) {
            $table->id();
            $table->string('nombrecompleto');
            $table->string('codigo', 15)->nullable();
            $table->string('categoria', 45)->nullable();
            $table->string('compania', 45)->nullable();
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
        Schema::dropIfExists('competencia.COM_CONCURSANTES');
    }
};
