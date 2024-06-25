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
        if (session('user')->rol != 'Estudiante') {
            return badRequest('No tienes permisos suficientes');
        }else{
            try {
                $estudiante = Estudiante::with('user')->findOrFail($id_estudiante);
            } catch (Exception $e) {
                return notFound('Estudiante no encontrado');
            }
            return view('estudiante.index', ['estudiante' => $estudiante]); 
        }        
    }

    public function consultarTrabajos(string $id_estudiante)
    {
        if (session('user')->rol != 'Estudiante') {
            return badRequest('No tienes permisos suficientes');
        }else{
            try {
                $estudiante = Estudiante::with('user')->findOrFail($id_estudiante);
            } catch (Exception $e) {
                return notFound('Estudiante no encontrado');
            }
            $trabajos = DB::table('trabajoacademico')
                ->join('estudiante', 'trabajoacademico.id_trabajoAcademico', '=', 'estudiante.id_trabajoAcademico')
                ->where('estudiante.id_estudiante', $id_estudiante)
                ->get();
            return view('trabajo.consultarTrabajos', ['trabajos' => $trabajos, 'estudiante' => $estudiante]);            
            
        }
        
    }
    public function registrarTrabajoForm(string $id_estudiante)
    {
        if (session('user')->rol != 'Estudiante') {
            return badRequest('No tienes permisos suficientes');
        }else{
            try {
                $estudiante = Estudiante::with('user')->findOrFail($id_estudiante);
            } catch (Exception $e) {
                return notFound('Estudiante no encontrado');
            }
            //si hay un trabajo con ese id estudiante, no se puede registrar otro
            if ($estudiante->id_trabajoAcademico) {
                return redirect()->route('estudiante.consultarTrabajos', ['id_estudiante' => $id_estudiante])->with('error', 'Ya tienes un trabajo registrado.');
            }else{
                return view('trabajo.registrarTrabajoForm',['estudiante' => $estudiante]);
            }
            
        }
    }

    public function registrarTrabajo(Request $request)
    {//form de registro de trabajo
        ini_set('memory_limit','1G');

        if (session('user')->rol != 'Estudiante') {
            return badRequest('No tienes permisos suficientes');
        }else{
            $request->validate([
                'pdf_file' => 'required|mimes:pdf|max:30720', // Limita a archivos PDF con un tamaño máximo de 2MB
            ]);
    
            // Obtener el contenido del archivo PDF
            $pdfContent = file_get_contents($request->file('pdf_file')->getRealPath());
    
            // Guardar en la base de datos
            try{
                DB::table('trabajoacademico')->insert([
                    'id_tipoTrabajo' => $request->input('tipoTrabajoAcademico'),
                    'titulo' => $request->input('titulo'),
                    'descripcion' => $request->input('descripcion'),
                    'fecha_inicio' => $request->input('fechaInicio'),
                    'id_area' => $request->input('area'),
                    'contenido' => $pdfContent,
                    'status' => 'En proceso de registro',
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }
            
            $trabajoId = DB::getPdo()->lastInsertId();
            $participantes = $request->input('integrantes', []);
            foreach ($participantes as $participante) {
                DB::table('estudiante')
                    ->where('id_estudiante', $participante)
                    ->update(['id_trabajoAcademico' => $trabajoId]);
            }
            //que haga redirect a la vista de consultar trabajos
            return redirect()->route('estudiante.consultarTrabajos', ['id_estudiante' => session('user')->id_estudiante])->with('success', 'Trabajo registrado correctamente.');

        }
        // Validar la solicitud
        
    }
    public function ttDetails($id_estudiante, $id)
    {
        if (session('user')->rol != 'Estudiante') {
            return badRequest('No tienes permisos suficientes');
        }else{
            $trabajo = DB::table('trabajoacademico')->where('id_trabajoAcademico', $id)->first();
            //buscar sinodales en  sinodal_trabajoacademico y luego ese id en docente
            $listaSinodales = DB::table('sinodal_trabajoacademico')
                ->where('id_trabajoAcademico', $id)
                ->pluck('id_sinodal')
                ->toArray();
            if ($listaSinodales == null) {
                $sinodales = [];
            }else{
                foreach ($listaSinodales as $sinodal) {
                    $sinodales[] = DB::table('docente')->where('id_docente', $sinodal)->first();
                }
            }
            
            $listaDirector = DB::table('director_trabajoacademico')
                ->where('id_trabajoAcademico', $id)
                ->pluck('id_docente')
                ->toArray();
            if ($listaDirector == null) {
                $directores = [];
            }else{
                foreach ($listaDirector as $director) {
                    $directores[] = DB::table('docente')->where('id_docente', $director)->first();
                }
            }
            
            $listaDeParticipantes = DB::table('estudiante')
                ->where('id_trabajoAcademico', $id)
                ->pluck('id_estudiante')
                ->toArray();
            if ($listaDeParticipantes == null) {
                $participantes = [];
            }else{
                foreach ($listaDeParticipantes as $participante) {
                    $participantes[] = DB::table('estudiante')->where('id_estudiante', $participante)->first();
                }
            }
            
            return view('estudiante.ttDetails', ['trabajo' => $trabajo, 'sinodales' => $sinodales, 'directores' => $directores, 'participantes' => $participantes, 'id_estudiante' => $id_estudiante]);
        }
    }
    public function AprobarRegistro($id_estudiante,$id, $aprobado)
    {
        try {
            $nuevoEstatus = $aprobado === 'Si' ? 'En proceso' : 'Rechazado';

            // Actualizar el estado del trabajo académico
            DB::table('trabajoacademico')
                ->where('id_trabajoAcademico', $id)
                ->update(['status' => $nuevoEstatus]);

            // Obtener los trabajos académicos que están terminados
            $trabajos = DB::table('trabajoacademico')->where('status', 'Terminado')->get();

            // Redirigir con un mensaje de éxito
            return redirect()->route('estudiante.consultarTrabajos', ['id_estudiante' => session('user')->id_estudiante])->with('success', 'Estatus cambiado correctamente.');
        } catch (\Exception $e) {
            // Manejar errores y redirigir con un mensaje de error
            return redirect()->route('estudiante.consultarTrabajos')->with('error', 'Hubo un problema al actualizar el estado del trabajo académico: ' . $e->getMessage());
        }
    }

    public function mostrarbusqueda(string $id_estudiante)
    {
        try {
            $estudiante = Docente::with('user')->findOrFail($id_estudiente);
        } catch (Exception $e) {
            return notFound('estudiente no encontrado');
        }
        return view('Busqueda.busquedasimple', ['estudiante' => $estudiante]);
    }
}
