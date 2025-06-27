<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialUsoAireAcondicionadosTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_uso_aire_acondicionados', function (Blueprint $table) {
            $table->id();
            $table->time('horainicio');
            $table->time('horafin');
            $table->date('fecha');
            $table->integer('temperatura');
            $table->foreignId('aire_acondicionado_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('historial_uso_aire_acondicionados');
    }
}
