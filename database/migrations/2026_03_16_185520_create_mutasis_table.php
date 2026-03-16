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
        Schema::create('mutasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
            $table->enum('jenis', ['Masuk', 'Keluar', 'Pindah Kelas Dalam Madrasah']);
            $table->date('tanggal_mutasi');
            $table->string('asal_sekolah', 150)->nullable();     // jika masuk
            $table->string('tujuan_sekolah', 150)->nullable();   // jika keluar
            $table->string('no_surat', 100)->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->text('alasan')->nullable();
            $table->foreignId('tahun_ajaran_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasis');
    }
};
