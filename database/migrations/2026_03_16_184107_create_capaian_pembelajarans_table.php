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
        Schema::create('capaian_pembelajarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_pelajaran_id')->constrained()->onDelete('cascade');
            $table->foreignId('kurikulum_version_id')->nullable()->constrained('kurikulum_versions')->nullOnDelete();
            $table->enum('fase', ['A', 'B', 'C', 'D', 'E', 'F']);
            $table->string('elemen');
            $table->text('sub_elemen')->nullable();
            $table->text('deskripsi_cp');
            $table->year('tahun_ajaran_start')->nullable(); // agar bisa versi lama tetap ada
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capaian_pembelajarans');
    }
};
