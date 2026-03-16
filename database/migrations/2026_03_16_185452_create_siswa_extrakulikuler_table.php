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
        Schema::create('siswa_extrakulikuler', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('ekstrakurikuler_id')->constrained()->onDelete('cascade');
            $table->foreignId('tahun_ajaran_id')->constrained()->onDelete('cascade');
            $table->unsignedTinyInteger('semester')->nullable(); // 1 atau 2, atau null jika tahunan
            $table->string('jabatan', 50)->nullable();           // Ketua, Anggota, dll
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Selesai'])->default('Aktif');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['siswa_id', 'ekstrakurikuler_id', 'tahun_ajaran_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_extrakulikuler');
    }
};
