<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id(); // Crea una columna `id` como BIGINT UNSIGNED con AUTO_INCREMENT
            $table->unsignedBigInteger('idpelicula'); // Columna `idpelicula`
            $table->string('nombre_pelicula'); // Columna `nombre_pelicula` de tipo VARCHAR
            $table->text('descripcion'); // Columna `descripcion` de tipo TEXT
            $table->string('tipo_de_problema'); // Columna `tipo_de_problema` de tipo VARCHAR
            $table->integer('minuto_del_problema'); // Columna `minuto_del_problema` de tipo INT
            $table->timestamps(); // Agrega columnas created_at y updated_at

            // Puedes agregar una clave foránea si deseas relacionar `idpelicula` con otra tabla
            // $table->foreign('idpelicula')->references('id')->on('peliculas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
