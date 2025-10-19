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
        Schema::create('katas', function (Blueprint $table) {
            $table->id();
            $table->string('kata_bangka'); // Kolom untuk kata dalam bahasa Bangka
            $table->text('arti_indonesia'); // Kolom untuk arti dalam bahasa Indonesia
            $table->string('foto')->nullable(); // Kolom untuk path foto, boleh kosong
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katas');
    }
};