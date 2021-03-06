<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntrianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->integer('no_transaksi')->unsigned();
            $table->string('nama_layanan');
            $table->foreign('no_transaksi')->references('id')->on('transaksi')->primary()->onDelete('cascade');
            $table->foreign('nama_layanan')->references('nama_layanan')->on('layanan')->onDelete('cascade');
            $table->timestamp('waktu_masuk_antrian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('antrian', function (Blueprint $table) {
            $table->dropForeign('antrian_no_transaksi_foreign');
            $table->dropForeign('antrian_nama_layanan_foreign');
        });
        Schema::dropIfExists('antrian');
    }
}
