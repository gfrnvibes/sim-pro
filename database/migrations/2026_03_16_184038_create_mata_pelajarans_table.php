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
        Schema::create('mata_pelajarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kurikulum_version_id')->nullable()->constrained('kurikulum_versions')->nullOnDelete();
            $table->string('kode', 20)->unique(); // PAI-AQH, MTK, dll
            $table->string('nama');
            $table->enum('kelompok', ['A', 'B', 'Muatan Lokal', 'Projek', 'Keahlian', 'Lainnya'])->nullable();
            $table->boolean('is_pai_sub')->default(false); // khusus MTs
            $table->enum('fase', ['A', 'B', 'C', 'D', 'E', 'F'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_pelajarans');
    }
};
