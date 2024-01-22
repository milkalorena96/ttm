<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id();
            $table->string('slug',50);
            $table->string('description',155)->nullable();
            $table->string('nombre');
            $table->string('ruc',12)->unique();
            $table->string('razonsocial',150);
            $table->string('estado');
            $table->string('ubicacion')->nullable();
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('imagen');
            $table->text('descripcion')->nullable();
            $table->string('visitas')->default(0);
            $table->unsignedBigInteger('id_lugar');
            $table->foreign('id_lugar')->references('id')->on('lugares_turisticos');
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
        Schema::dropIfExists('hoteles');
    }
}
