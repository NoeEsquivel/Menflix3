<?php
// app/Http/Controllers/PeliculaController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Comentario;

class PeliculaController extends Controller
{
    public function show($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $comentarios = Comentario::where('idpelicula', $id)->get();

        return view('layout.contenido', compact('pelicula', 'comentarios'));
    }

    public function storeComentario(Request $request, $idpelicula)
    {
        $request->validate([
            'comentario' => 'required|string|max:500',
        ]);

        Comentario::create([
            'idpelicula' => $idpelicula,
            'comentario' => $request->comentario,
        ]);

        return redirect()->route('contenido.show', $idpelicula)->with('success', 'Comentario agregado!');
    }

    public function search(Request $request)
{
    $query = $request->input('query');

    // Busca la película por nombre
    $pelicula = Pelicula::where('nombre', 'LIKE', "%$query%")->first();

    if ($pelicula) {
        // Si se encuentra la película, redirige a la vista de contenido con la información de la película
        return redirect()->route('contenido.show', $pelicula->idpeliculas);
    } else {
        // Si no se encuentra la película, redirige de vuelta a inicio con un mensaje
        return redirect('/')->with('error', 'Película no encontrada');
    }
}

public function relacionadas($nombre)
{
    
    $peliculasRelacionadas = Pelicula::where('nombre', 'LIKE', '%' . $nombre . '%')
        ->where('nombre', '!=', $nombre) // Excluir la película actual
        ->limit(5) // Puedes ajustar la cantidad de resultados que desees mostrar
        ->get();

    return response()->json($peliculasRelacionadas);
}


}