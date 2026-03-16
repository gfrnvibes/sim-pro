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
        Schema::create('penilaian_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_kelas_id')->constrained()->onDelete('cascade');
            $table->foreignId('capaian_pembelajaran_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('mata_pelajaran_id')->nullable()->constrained()->nullOnDelete(); // jika nilai akhir mapel
            $table->enum('jenis_penilaian', ['Formatif', 'Sumatif Tengah', 'Sumatif Akhir', 'Projek', 'Observasi', 'Portofolio', 'Lainnya']);
            $table->decimal('nilai', 5, 2)->nullable();
            $table->string('predikat', 20)->nullable(); // SB, B, C, K
            $table->text('deskripsi')->nullable();
            $table->unsignedTinyInteger('semester');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_siswas');
    }
};
