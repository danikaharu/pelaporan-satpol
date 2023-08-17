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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_pelapor');
            $table->string('nomor_hp');
            $table->string('kabupaten');
            $table->integer('kecamatan');
            $table->date('tanggal_kegiatan');
            $table->string('jenis_kegiatan');
            $table->text('jenis_pelanggaran')->nullable();
            $table->text('jenis_sanksi');
            $table->integer('jumlah_pelanggar')->nullable();
            $table->text('sanksi_administratif')->nullable();
            $table->string('denda_administratif')->nullable();
            $table->integer('sanksi_pidana')->nullable();
            $table->string('denda_pidana')->nullable();
            $table->string('lama_kurungan')->nullable();
            $table->text('foto_dokumentasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
