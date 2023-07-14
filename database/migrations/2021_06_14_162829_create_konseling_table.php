<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonselingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konseling', function (Blueprint $table) {
            $table->id('konseling_id');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('kategori_id', 4);
            $table->foreign('kategori_id')->references('kategori_id')->on('kategori');
            $table->enum('jenis_sesi', ['online', 'offline']);
            $table->integer('harga');
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status', ['belum', 'menunggu', 'konfirmasi', 'jadwal_ulang']);
            $table->enum('status_sesi', ['nonaktif', 'aktif', 'selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konseling');
    }
}
