<?php
// app/Models/Reporte.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    protected $fillable = ['idpelicula', 'nombre_pelicula', 'descripcion', 'tipo_de_problema', 'minuto_del_problema'];
}
