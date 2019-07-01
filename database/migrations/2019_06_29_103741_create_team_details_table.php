<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('NamaPeserta1');
            $table->string('JurusanPeserta1');
            $table->string('NoHPPeserta1');
            $table->string('IDLinePeserta1')->nullable();
            $table->string('KartuTandaMahasiswa1')->nullable();
            $table->string('NamaPeserta2');
            $table->string('JurusanPeserta2');
            $table->string('NoHPPeserta2');
            $table->string('IDLinePeserta2')->nullable();
            $table->string('KartuTandaMahasiswa2')->nullable();
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
        Schema::dropIfExists('team_details');
    }
}
