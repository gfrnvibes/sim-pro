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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('tahun_ajaran_id')->constrained()->onDelete('cascade');
            $table->string('nama_prestasi');
            $table->text('deskripsi')->nullable();
            $table->string('penyelenggara', 150)->nullable();
            $table->enum('tingkat', ['Kelas', 'Sekolah', 'Kecamatan', 'Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional']);
            $table->date('tanggal_prestasi')->nullable();
            $table->string('juara', 50)->nullable();           // Juara 1, Harapan 2, dll
            $table->string('bukti_file_path')->nullable();     // scan sertifikat / foto
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
