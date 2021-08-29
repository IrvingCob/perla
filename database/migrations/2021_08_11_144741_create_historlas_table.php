<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistorlasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historlas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('fecha')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('precio')->nullable();
            $table->string('importe')->nullable();
            $table->string('viver_id')->nullable();
            $table->string('proveedor_id')->nullable();
            $table->string('status_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('historlas');
    }
}
