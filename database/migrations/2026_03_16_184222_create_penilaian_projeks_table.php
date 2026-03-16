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
        Schema::create('penilaian_projek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projek_id')->constrained('projek_penguatan_profil')->onDelete('cascade');
            $table->foreignId('siswa_kelas_id')->constrained()->onDelete('cascade');
            $table->decimal('nilai', 5, 2)->nullable();
            $table->text('deskripsi')->nullable();
            $table->json('bukti')->nullable(); // array path file atau link
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_projeks');
    }
};
