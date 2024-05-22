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
        Schema::create('sertifikats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inspektor_id')->nullable();
            $table->bigInteger('inspeksi_id')->nullable();
            $table->biginteger('kendaraan_id')->nullable();
            $table->text('sertifikat_number')->nullable();
            $table->date('valid_from_date')->nullable();
            $table->date('valid_until_date')->nullable();

            $table->string('issued_by')->nullable();
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
        Schema::dropIfExists('sertifikats');
    }
};
