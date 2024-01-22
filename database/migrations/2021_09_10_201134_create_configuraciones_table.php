<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateConfiguracionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 67);
            $table->string('description', 155);
            $table->string('urlfoto', 100)->default('foto.jpg');
            $table->string('colorPrimario', 7)->default('#33FF83');
            $table->string('colorSecundario', 7)->default('#33FFF0');
            $table->string('urlfavicon', 100)->default('foto.jpg');
            $table->string('urllogo', 100)->default('foto.jpg');
            $table->string('razonsocial', 100);
            $table->string('direccion', 150);
            $table->string('celular', 11);
            $table->string('email', 100);
            $table
                ->string('facebook', 100)
                ->default('https://www.facebook.com');
            //   $table->timestamps();
        });
        DB::table('configuraciones')->insert([
            'id' => '1',
            'titulo' => 'Web Turistico',
            'description' => 'Web turistico tingo maria',
            'razonsocial' => 'Web turismo',
            'direccion' => 'Tingo maria',
            'celular' => '968562352',
            'email' => 'turismostingomaria@gmail.com',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuraciones');
    }
}