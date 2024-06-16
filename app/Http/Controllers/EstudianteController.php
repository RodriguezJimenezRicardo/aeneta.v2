<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    public function index(string $id_estudiante)
    {
        try {
            $estudiante = Estudiante::with('user')->findOrFail($id_estudiante);
        } catch (Exception $e) {
            return notFound('Estudiante no encontrado');
        }
        return view('estudiante.index', ['estudiante' => $estudiante]);
    }

    public function consultarTrabajos()
    {
        $id_Estudiante = "2022100001";
        $trabajos = DB::table('trabajoacademico')
            ->join('estudiante', 'trabajoacademico.id_trabajoAcademico', '=', 'estudiante.id_trabajoAcademico')
            ->where('estudiante.id_estudiante', $id_Estudiante)
            ->get();
        return view('trabajo.consultarTrabajos', ['trabajos' => $trabajos]);
    }
}
