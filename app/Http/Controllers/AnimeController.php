<?php
// app/Http/Controllers/AnimeController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Comentarioa;

class AnimeController extends Controller
{
    // Método que muestra la lista de animes
    public function index()
    {
        $animes = Anime::all(); // Obtén todos los animes de la base de datos
        return view('layout.inicioa', compact('animes')); // Pasa la variable a la vista
    }

    // Método que muestra los detalles de un anime específico
    public function show($id)
    {
        // Obtiene el anime con sus comentarios
        $anime = Anime::with('comentarios')->findOrFail($id);
        $comentarios = $anime->comentarios; // Obtén los comentarios asociados al anime

        return view('layout.contenidoa', compact('anime', 'comentarios'));
    }

    // Método para almacenar comentarios de un anime
    public function storeComentarioa(Request $request, $idanimes)
    {
        $request->validate([
            'comentario' => 'required|string|max:500',
        ]);

        Comentarioa::create([
            'idanimes' => $idanimes,
            'comentario' => $request->comentario,
        ]);

        return redirect()->route('contenidoa.show', $idanimes)->with('success', 'Comentario agregado!');
    }

    // Método para buscar un anime por nombre
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Busca el anime por nombre
        $anime = Anime::where('nombre', 'LIKE', "%$query%")->first();

        if ($anime) {
            // Si se encuentra el anime, redirige a la vista de contenido con la información del anime
            return redirect()->route('contenidoa.show', $anime->id);
        } else {
            // Si no se encuentra el anime, redirige de vuelta a inicio con un mensaje
            return redirect('/')->with('error', 'Anime no encontrado');
        }
    }
}
