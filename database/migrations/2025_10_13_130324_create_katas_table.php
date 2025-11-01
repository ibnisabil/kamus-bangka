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
            $table->string('kata_bangka');
            $table->text('arti_indonesia');
            $table->text('definisi');
            $table->text('contoh');
            $table->text('sinonim');
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
