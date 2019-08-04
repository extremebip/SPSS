<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPesertas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pesertas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('NamaLengkap');
            $table->string('JenisKelamin');
            $table->string('NoHP');
            $table->string('IDLine')->nullable();
            $table->string('Jurusan');
            $table->string('NIM');
            $table->string('KartuTandaMahasiswa')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pesertas');
    }
}
