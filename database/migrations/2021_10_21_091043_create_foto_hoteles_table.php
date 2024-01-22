<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoHotelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_hoteles', function (Blueprint $table) {
            $table->id();
            //$table->string("slug", 255);
            $table->string("ruta", 255);
            $table->unsignedBigInteger('id_hotel');
            $table->foreign("id_hotel")
                ->references("id")
                ->on("hoteles")
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
        Schema::dropIfExists('foto_hoteles');
    }
}
