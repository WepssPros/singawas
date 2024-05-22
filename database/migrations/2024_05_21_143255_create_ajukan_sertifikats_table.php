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
        Schema::create('ajukan_sertifikats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('nomor_inspeksi')->nullable();
            $table->string('nopol_terdaftar')->nullable();
            $table->string('nomor_registrasi_kendaraan')->nullable();
            $table->string('status')->default('Belum Di Tinjau');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajukan_sertifikats');
    }
};
