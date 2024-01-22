<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoLugaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_lugares', function (Blueprint $table) {
            $table->id();
            //$table->string("slug", 255);
            $table->string("ruta", 255);
            $table->unsignedBigInteger('id_lugar');
            $table->foreign("id_lugar")
                ->references("id")
                ->on("lugares_turisticos")
                ->onDelete("cascade")
                ->onUpdate("cascade");
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
        Schema::dropIfExists('foto_lugares');
    }
}
