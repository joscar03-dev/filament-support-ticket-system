<?php

use App\Models\MensajeTexto;
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
        //creacion de la tabla mensaje_textos
        Schema::create('mensaje_textos', function (Blueprint $table) {
            $table->id();
            $table->text('mensaje');
            $table->text('respuesta')->nullable();
            $table->foreignId('enviado_a')->constrained('users')->onDelete('cascade');
            $table->foreignId('enviado_por')->constrained('users')->onDelete('cascade');
            $table->enum('estado', MensajeTexto::ESTADOS)->default(MensajeTexto::ESTADOS['PENDIENTE']);
            $table->text('comentarios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensaje_textos');
    }
};
