<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BusquedaController extends Controller
{
    public function buscar(Request $request)
    {
        $query = $request->input('query');

        // Realizar la búsqueda en la tabla trabajoterminal
        $trabajos = DB::table('trabajoacademico')
            ->where('id_tipoTrabajo', 'like', '%' . $query . '%')
            ->orWhere('titulo', 'like', '%' . $query . '%')
            ->orWhere('descripcion', 'like', '%' . $query . '%')
            ->orWhere('fecha_inicio', 'like', '%' . $query . '%')
            ->orWhere('fecha_final', 'like', '%' . $query . '%')
            ->orWhere('id_area', 'like', '%' . $query . '%')
            ->orWhere('contenido', 'like', '%' . $query . '%')
            ->orWhere('status', 'like', '%' . $query . '%')
            ->orWhere('id_trabajoAcademico', 'like', '%' . $query . '%')
            ->get();

        return view('Busqueda.busquedasimple', compact('trabajos', 'query'));
    }
    // Método para mostrar la vista de búsqueda avanzada
    public function busquedaAvanzada()
    {
        return view('Busqueda.busquedaavanzada');
    }

    // Método para manejar la búsqueda avanzada
    public function buscarAvanzada(Request $request)
    {
        $trabajos = DB::table('trabajoacademico')
            ->when($request->input('tipoTrabajo'), function($query, $tipoTrabajo) {
                return $query->where('id_tipoTrabajo', 'like', '%' . $tipoTrabajo . '%');
            })
            ->when($request->input('titulo'), function($query, $titulo) {
                return $query->where('titulo', 'like', '%' . $titulo . '%');
            })
            ->when($request->input('descripcion'), function($query, $descripcion) {
                return $query->where('descripcion', 'like', '%' . $descripcion . '%');
            })
            ->when($request->input('fechaInicio'), function($query, $fechaInicio) {
                return $query->where('fecha_inicio', '>=', $fechaInicio);
            })
            ->when($request->input('fechaFin'), function($query, $fechaFin) {
                return $query->where('fecha_final', '<=', $fechaFin);
            })
            ->when($request->input('area'), function($query, $area) {
                return $query->where('id_area', 'like', '%' . $area . '%');
            })
            ->get();

        return view('Busqueda.busquedaavanzada', compact('trabajos'));
    }
}
    