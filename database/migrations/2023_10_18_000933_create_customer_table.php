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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sap')->nullable();
            $table->string('kode_crm')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('alamat_invoice')->nullable();
            $table->string('alamat2')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('no_faximile')->nullable();
            $table->string('no_npwp_ktp')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('no_contact_person')->nullable();
            $table->string('email')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
