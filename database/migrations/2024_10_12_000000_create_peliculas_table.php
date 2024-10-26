<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id('idpeliculas');
            $table->string('nombre', 45)->nullable();
            $table->string('genero', 20)->nullable();
            $table->time('duracion')->nullable();
            $table->string('descripcion', 200)->nullable();
            $table->string('director', 45)->nullable();
            $table->double('calificacion')->nullable();
            $table->text('portada')->nullable();
            $table->text('video')->nullable();
            $table->string('protagonista', 25);
            $table->string('biografia', 300);
            $table->text('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
