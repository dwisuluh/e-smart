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
        Schema::create('anggota_ijins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ijin_dosen_id')->constrained()->onDelete('cascade');
            $table->foreignId('dosen_id')->constrained()->onDelete('cascade');
            $table->enum('status',['1','2','3','4','5'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_ijins');
    }
};
