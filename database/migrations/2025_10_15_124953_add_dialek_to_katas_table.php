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
        Schema::table('katas', function (Blueprint $table) {
            // Menambahkan kolom baru 'dialek' setelah kolom 'arti_indonesia'
            // nullable() berarti data lama yang tidak punya dialek tidak akan error
            $table->string('dialek')->nullable()->after('arti_indonesia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('katas', function (Blueprint $table) {
            // Perintah untuk menghapus kolom jika migration di-rollback
            $table->dropColumn('dialek');
        });
    }
};
