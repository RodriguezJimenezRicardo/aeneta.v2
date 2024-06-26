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
        $trabajos = DB::table('TrabajoAcademico')
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
        $query = DB::table('TrabajoAcademico');

        if ($request->filled('tipoTrabajo')) {
            $query->where('id_tipoTrabajo', 'like', '%' . $request->tipoTrabajo . '%');
        }

        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        if ($request->filled('descripcion')) {
            $query->where('descripcion', 'like', '%' . $request->descripcion . '%');
        }

        if ($request->filled('fechaInicio')) {
            $query->where('fecha_inicio', '>=', $request->fechaInicio);
        }

        if ($request->filled('fechaFin')) {
            $query->where('fecha_final', '<=', $request->fechaFin);
        }

        if ($request->filled('area')) {
            $query->where('id_area', 'like', '%' . $request->area . '%');
        }

        if ($request->filled('nombreAlumno')) {
            $alumnoIds = DB::table('Estudiante')
                ->where(function ($query) use ($request) {
                    $query->where('nombre', 'like', '%' . $request->nombreAlumno . '%')
                        ->orWhere('apellido', 'like', '%' . $request->nombreAlumno . '%');
                })
                ->pluck('id_trabajoAcademico');
            $query->whereIn('id_trabajoAcademico', $alumnoIds);
        }

        if ($request->filled('nombreProfesor')) {
            $profesorIds = DB::table('profesor')
                ->where('nombre', 'like', '%' . $request->nombreProfesor . '%')
                ->pluck('id_trabajoAcademico');
            $query->whereIn('id_trabajoAcademico', $profesorIds);
        }

        $trabajos = $query->get();

        return view('Busqueda.busquedaavanzada', compact('trabajos'));
    }
}
