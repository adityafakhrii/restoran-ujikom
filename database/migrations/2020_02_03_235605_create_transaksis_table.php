<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_pesanan')->unsigned();
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->integer('total_pembayaran');
            $table->integer('bayar');
            $table->integer('kembali');
            $table->enum('status',['diterima','dibayar']);
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
        Schema::dropIfExists('transaksis');
    }
}
