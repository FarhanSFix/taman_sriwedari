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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis', [
                'LS/TUNAI',
                'GU/TUNAI',
                'GU/KKPD',
                'SPP SPM',
            ])->default('LS/TUNAI');
            $table->date('bulan_pengesahan')->nullable();
            $table->string('link')->nullable();
            $table->string('bukti dukung')->nullable();
            $table->string('bank')->nullable();
            $table->enum('keterangan', [
                'Belum diaudit',
                'Sudah diaudit',
            ])->default('Belum diaudit');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
