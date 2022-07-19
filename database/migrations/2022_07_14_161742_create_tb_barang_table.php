<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang')->unique();
            $table->bigInteger('id_kategori')->unsigned();
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('stok');
            $table->string('path_image');
            $table->timestamps();
        });
        // Schema::table('tb_kategori', function (Blueprint $table) {
        //     $table->foreign('id')->references('id_kategori')->on('tb_barang')
        //     ->onUpdate('cascade')
        //     ->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_barang');
    }
}
