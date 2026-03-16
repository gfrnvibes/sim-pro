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
        Schema::create('extrakulikulers', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);                    // Pramuka, Paskibra, Rohis, Tari Saman, dll
            $table->string('kode', 20)->unique()->nullable();
            $table->text('deskripsi')->nullable();
            $table->enum('kategori', ['Wajib', 'Pilihan', 'Keagamaan', 'Olahraga', 'Seni', 'Lainnya'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extra_kulikulers');
    }
};
