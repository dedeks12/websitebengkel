<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJasanota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa_nota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('jasa_id');
            $table->string('status');
            $table->string('pelanggan');
            $table->string('tanggal');
            $table->string('plat');
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
        Schema::dropIfExists('jasa_nota');
    }
}
