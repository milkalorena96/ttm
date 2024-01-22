<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugaresTuristicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugares_turisticos', function (Blueprint $table) {
            $table->id();
            $table->string('slug',50);
            $table->string('titulo',67);
            $table->string('description',155)->nullable();
            $table->string('mapa');
            $table->string('imagen');
            $table->string('ubicacion')->nullable();
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('visitas')->default(0);
            $table->foreignId('categoria_id')->constrained();
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
        Schema::dropIfExists('lugares_turisticos');
    }
}
