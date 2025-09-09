<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('aulas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->integer('capacidad')->nullable();
        $table->integer('temperatura')->nullable(); // extras
        $table->string('posicion_cortinas')->nullable();
        $table->integer('stock_roto')->nullable();
        $table->integer('mesas_disponibles')->nullable();
        $table->integer('sillas_disponibles')->nullable();
        $table->integer('intensidad_luz')->nullable();
        $table->string('estado_proyector')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * 
     */
    public function down()
    {
        Schema::dropIfExists('aulas');
    }
}
