<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla si no sigue la convención de Laravel
    protected $table = 'peliculas';

    // Si tu tabla no tiene timestamps (created_at, updated_at), desactiva esta opción
    public $timestamps = false;

    // Opcionalmente, puedes especificar la clave primaria si no sigue la convención (id)
    protected $primaryKey = 'idpeliculas';

    // Agrega los campos que se pueden llenar a través de asignación masiva
    protected $fillable = [
        'nombre',
        'genero',
        'duracion',
        'descripcion',
        'director',
        'calificacion',
        'portada',
        'video'
    ];
}
