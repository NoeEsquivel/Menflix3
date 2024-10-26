<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentarios2Table extends Migration
{
    public function up()
    {
        Schema::create('comentarios2', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idanimes');
            $table->text('comentario');
            $table->timestamps();

            $table->foreign('idanimes')->references('idanimes')->on('animes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comentarios2');
    }
}