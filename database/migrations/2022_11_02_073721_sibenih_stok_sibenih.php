<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sibenih_stok_benih', function (Blueprint $table) {
            $table->id();
            $table->date('tgl')->nullable();
            $table->string('nama_pt',50)->nullable();
            $table->text('alamat_usaha')->nullable();
            $table->string('tlp',16)->nullable();
            $table->string('komoditas',50)->nullable();
            $table->string('varietas',50)->nullable();
            $table->string('kelas_benih',50)->nullable();
            $table->string('kota',50)->nullable();
            $table->string('stok_benih',10)->nullable();
            $table->string('user',50)->nullable();
            $table->dateTime('tgl_input')->nullable();
            $table->dateTime('tgl_edit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sibenih_stok_benih');
    }
};
