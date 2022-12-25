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
        Schema::create('sibenih_penyebaran_varietas', function (Blueprint $table) {
            $table->id();
            $table->string('kabupaten_id', 100);
            $table->bigInteger('varietas_id');
            $table->integer('year');
            $table->string('month', 255);
            $table->decimal('value', 22, 4);
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
        Schema::dropIfExists('sibenih_penyebaran_varietas');
    }
};
