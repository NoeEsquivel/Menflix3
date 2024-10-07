<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = 'reportes';

    protected $fillable = [
        'idpelicula', 
        'nombre_pelicula', 
        'descripcion', 
        'tipo_de_problema', 
        'minuto_del_problema'
    ];
}
