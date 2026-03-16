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
        Schema::create('kurikulum_versions', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);                    // Contoh: "Kurikulum Merdeka 2022", "Kurmer Revisi 2025"
            $table->string('kode', 50)->unique()->nullable(); // Misal: KURMER-2022
            $table->year('tahun_mulai')->nullable();
            $table->year('tahun_selesai')->nullable();      // null = masih berlaku
            $table->text('deskripsi')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_default')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulum_versions');
    }
};
