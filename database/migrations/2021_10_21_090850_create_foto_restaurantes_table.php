<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoRestaurantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_restaurantes', function (Blueprint $table) {
            $table->id();
            //$table->string("slug", 255);
            $table->string("ruta", 255);
            $table->unsignedBigInteger('id_restuarante');
            $table->foreign("id_restuarante")
                ->references("id")
                ->on("restaurantes")
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
        Schema::dropIfExists('foto_restaurantes');
    }
}
