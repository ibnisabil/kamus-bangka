<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('katas', function (Blueprint $table) {
            $table->text('contoh')->nullable()->after('definisi');
            $table->text('sinonim')->nullable()->after('contoh');
        });
    }

    public function down(): void
    {
        Schema::table('katas', function (Blueprint $table) {
            $table->dropColumn(['definisi', 'contoh', 'sinonim']);
        });
    }
};
