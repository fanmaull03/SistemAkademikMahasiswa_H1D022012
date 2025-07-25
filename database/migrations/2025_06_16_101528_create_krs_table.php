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
        Schema::create('krs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->cascadeOnDelete();
    $table->foreignId('matakuliah_id')->constrained('matakuliahs')->cascadeOnDelete();
    $table->string('semester');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs');
    }
};
