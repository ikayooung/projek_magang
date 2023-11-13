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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('no_bill')->nullable();
            $table->date('tanggal_kirim')->nullable();
            $table->date('tanggal_terima')->nullable();
            $table->string('nama_penerima')->nullable();
            $table->string('nama_kapal')->nullable();
            $table->string('no_agenda')->nullable();
            $table->string('no_invoice')->nullable();
            $table->string('no_fp')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
