<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id('idanimes');
            $table->string('nombre', 45)->nullable();
            $table->string('generos', 100)->nullable();
            $table->integer('capitulos')->nullable();
            $table->string('descripcion', 500)->nullable();
            $table->string('Temporada', 45)->nullable();
            $table->double('calificacion')->nullable();
            $table->text('portada')->nullable();
            $table->text('video')->nullable();
            $table->string('protagonista', 25);
            $table->string('secundarios', 300);
            $table->text('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('animes');
    }
}
