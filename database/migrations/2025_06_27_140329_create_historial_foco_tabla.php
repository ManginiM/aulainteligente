<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialFocoTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_foco', function (Blueprint $table) {
            $table->id();
            $table->time('horainicio');
            $table->time('horafin');
            $table->date('fecha');
            $table->integer('estado');
            $table->foreignId('focos_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('historial_foco');
    }
}
