<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;  

class ReporteController extends Controller
{   

    public function index()

    {
        $reportes = Reporte::get();

        return $reportes;

    }

    public function edit ($id)
    {
        $reporte = Reporte::findOrFail($id);

        return $reporte;
    }




    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'idpelicula' => 'required|integer',
            'nombre_pelicula' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo_de_problema' => 'required|string',
            'minuto_del_problema' => 'required|integer',
        ]);
    
        
        $reporte = new Reporte();
        $reporte->idpelicula = $validatedData['idpelicula'];
        $reporte->nombre_pelicula = $validatedData['nombre_pelicula'];
        $reporte->descripcion = $validatedData['descripcion'];
        $reporte->tipo_de_problema = $validatedData['tipo_de_problema'];
        $reporte->minuto_del_problema = $validatedData['minuto_del_problema'];
    
        
        $reporte->save();
    
        return response()->json(['message' => 'Reporte guardado exitosamente'], 201);
    } 
    
}
