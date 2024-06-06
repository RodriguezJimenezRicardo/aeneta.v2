<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    public function index()
    {
        $id_Estudiante = "2022100001";
        $info_Estudiante = DB::table('estudiante')
            ->where('id_estudiante', $id_Estudiante)
            ->first();
        return view('estudiante.index', ['info_Estudiante' => $info_Estudiante]);
    }

    public function ConsultarTrabajos()
    {
        $id_Estudiante = "2022100001";
        $trabajos = DB::table('trabajoacademico')
            ->join('estudiante', 'trabajoacademico.id_trabajoAcademico', '=', 'estudiante.id_trabajoAcademico')
            ->where('estudiante.id_estudiante', $id_Estudiante)
            ->get();
        return view('trabajo.consultarTrabajos', ['trabajos' => $trabajos]);
    }
}
