<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranLombasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_lombas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('NamaPengirim')->nullable();
            $table->string('NamaBank')->nullable();
            $table->string('BuktiTransfer')->nullable();
            $table->dateTime('WaktuSubmitTransfer')->nullable();
            $table->integer('admin_id')->nullable();
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
        Schema::dropIfExists('pembayaran_lombas');
    }
}
