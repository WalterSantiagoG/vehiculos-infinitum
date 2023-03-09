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
        Schema::create('personasvehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion',10);
            $table->foreign('identificacion')->references('identificacion')->on('personas')->onDelete('cascade');
            $table->string('placa', 6);
            $table->foreign('placa')->references('placa')->on('vehiculos')->onDelete('cascade');
            $table->boolean('vhactual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personasvehiculos');
    }
};
