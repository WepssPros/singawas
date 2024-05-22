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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->nullable();
            $table->text('nomor_registrasi')->nullable();
            $table->text('nopol')->nullable();
            $table->string('brand_kendaraan')->nullable();
            $table->string('type')->nullable();
            $table->date('tahun_pembuatan')->nullable();
            $table->string('nama_owner')->nullable();
            $table->text('alamat_owner')->nullable();
            $table->string('nomorhp_owner')->nullable();
            $table->boolean('verified')->default(false);

            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
