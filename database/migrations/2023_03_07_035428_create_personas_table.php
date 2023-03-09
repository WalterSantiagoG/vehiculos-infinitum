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
        Schema::create('personas', function (Blueprint $table) {
            //$table->id();
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->date('fnacimiento');
            $table->string('identificacion',10)->unique();
            $table->string('profesion', 100);
            $table->boolean('casado');
            $table->double('ingresosm', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
