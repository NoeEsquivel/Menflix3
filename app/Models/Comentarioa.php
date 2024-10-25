<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarioa extends Model
{
    use HasFactory;

    protected $table = 'comentarios2';

    protected $fillable = [
        'idanimes',
        'comentario',
    ];

    public $timestamps = false;  // Desactivar timestamps automáticos
}
