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
        Schema::create('sibenih_tanam_pangan', function (Blueprint $table) {
            $table->id();
            $table->id();
            $table->string('s1_nomor_lapangan');
            $table->bigInteger('s1_komoditas_id');
            $table->bigInteger('s1_produsen_id');
            $table->bigInteger('s1_produsen_alamat_id');
            $table->bigInteger('s2_varietas_id');
            $table->string('s2_jenis_tanaman');
            $table->date('s2_tgl_panen');
            $table->bigInteger('s3_produsen_id');
            $table->bigInteger('s3_kelas_benih_id');
            $table->string('s3_no_kel_benih');
            $table->string('s3_no_label_sumber');
            $table->bigInteger('s2_kelas_benih_id');
            $table->date('s2_tgl_tebar');
            $table->date('s2_tgl_tanam');
            $table->date('s2_tgl_pendhl');
            $table->date('s2_tgl_vegetatif');
            $table->date('s2_tgl_primordia');
            $table->date('s2_tgl_masak');
            $table->string('s6_ttd');
            $table->string('s6_label_benih');
            $table->string('s6_dena_lokasi');
            $table->string('s6_surat_rekom');
            $table->string('s6_surat_pengantar');
            $table->bigInteger('admin_id');
            $table->string('status')->default('draft');
            $table->string('s1_nomor_antrian');
            $table->softDeletes();
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
        Schema::dropIfExists('sibenih_tanam_pangan');
    }
};
