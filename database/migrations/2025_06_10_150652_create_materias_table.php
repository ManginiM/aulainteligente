<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatemateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('carrera');
            $table->integer('año');
            $table->string('tipoCursada');
            $table->foreignId('docente_id')->nullable()->constrained('docentes')->onDelete('set null');
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
        Schema::dropIfExists('materias');
        $table->foreignId('docente_id')->nullable(false)->change();
        //$table->dropForeign(['docente_id']);
        //$table->unsignedBigInteger('docente_id')->nullable(false)->change();
        //$table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
    }
}
