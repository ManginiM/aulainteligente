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
        $table->float('temperatura')->nullable();
        $table->enum('posicion_cortinas', ['extendidas', 'media_altura', 'guardadas'])->default('guardadas');
        $table->integer('stock_roto')->nullable();
        $table->integer('mesas_disponibles')->nullable();
        $table->integer('sillas_disponibles')->nullable();
        $table->float('intensidad_luz')->nullable();
        $table->enum('estado_proyector', ['funciona', 'mantenimiento', 'fuera_servicio', 'sin_hdmi'])->default('funciona');
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
        Schema::dropIfExists('aulas');
    }
}
