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
        Schema::create('inspeksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kendaraan_id')->nullable();
            $table->date('tanggal_inspeksi')->nullable();
            $table->string('hasil_inspeksi')->nullable();
            $table->text('bukti_foto1')->nullable();
            $table->text('bukti_foto2')->nullable();
            $table->text('bukti_foto3')->nullable();
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
        Schema::dropIfExists('inspeksis');
    }
};
