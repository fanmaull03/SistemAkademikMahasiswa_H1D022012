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
       Schema::create('mahasiswa', function (Blueprint $table) {
    $table->id();
    $table->string('nim')->unique();
    $table->string('nama');
    $table->foreignId('prodi_id')->constrained('prodis')->cascadeOnDelete();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
    $table->dropForeign(['prodi_id']);
});
Schema::dropIfExists('mahasiswa');

    }
};
