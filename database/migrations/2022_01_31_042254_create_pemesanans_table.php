<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->bigIncrements('id_pemesanan');
            $table->integer('id_resepsionis')->unsigned()->nullable()->default(12);
            $table->string('nama_pemesan', 100)->nullable()->default('text');
            $table->string('email', 100)->nullable()->default('text');
            $table->string('no_handphone', 100)->nullable()->default('text');
            $table->string('nama_tamu', 100)->nullable()->default('text');
            $table->integer('tipe_kamar')->unsigned()->nullable()->default(12);
            $table->datetime('tanggal_pemesanan');
            $table->datetime('tanggal_checkin');
            $table->datetime('tanggal_checkout');
            $table->string('jumlah_kamar', 100)->nullable()->default('text');
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
        Schema::dropIfExists('pemesanans');
    }
}
