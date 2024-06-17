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
        if (session('user')->rol != 'Estudiante') {
            return badRequest('No tienes permisos suficientes');
        }else{
            $request->validate([
                'pdf_file' => 'required|mimes:pdf|max:2048', // Limita a archivos PDF con un tamaño máximo de 2MB
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
}
