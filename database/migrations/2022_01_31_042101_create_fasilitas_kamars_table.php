<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_kamars', function (Blueprint $table) {
            $table->bigIncrements('id_fasilitas_kamar');
            $table->string('nama_fasilitas');
             $table->string('keterangan');
              $table->string('gambar1');
               $table->string('gambar2');
                $table->string('gambar3');

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
        Schema::dropIfExists('fasilitas_kamars');
    }
}
