<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfDocumentController extends Controller
{
    public function SubirTerminado(Request $request)
    {
        try {
            // Validar la solicitud
            $request->validate([
                'pdf_file' => 'required|mimes:pdf|max:2048', // Limita a archivos PDF con un tamaño máximo de 2MB
            ]);

            // Obtener el contenido del archivo PDF
            $pdfContent = file_get_contents($request->file('pdf_file')->getRealPath());

            // Guardar en la base de datos
            DB::table('trabajoacademico')->insert([
                'id_tipoTrabajo' => $request->input('tipoTrabajoAcademico'),
                'titulo' => $request->input('titulo'),
                'descripcion' => $request->input('descripcion'),
                'fecha_inicio' => $request->input('fechaInicio'),
                'fecha_final' => $request->input('fechaFinal'),
                'id_area' => $request->input('area'),
                'contenido' => $pdfContent,
            ]);

            $trabajoId = DB::getPdo()->lastInsertId();
            $sinodales = $request->input('sinodales', []);

            foreach ($sinodales as $sinodal) {
                DB::table('sinodal_trabajoacademico')->insert([
                    'id_sinodal' => $sinodal,
                    'id_trabajoAcademico' => $trabajoId,
                ]);
            }
            DB::table('director_trabajoacademico')->insert([
                'id_docente' =>  $request->input('director'),
                'id_trabajoAcademico' => $trabajoId,
            ]);
            DB::table('director_trabajoacademico')->insert([
                'id_docente' =>  $request->input('director'),
                'id_trabajoAcademico' => $trabajoId,
            ]);
            $participantes = $request->input('integrantes', []);
            foreach ($participantes as $participante) {
                DB::table('estudiante')
                    ->where('id_estudiante', $participante)
                    ->update(['id_trabajoAcademico' => $trabajoId]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
        return redirect()->back()->with('success', 'PDF subido correctamente.');
    }

    public function SubirTerminadoForm()
    {
        return view('trabajo.subirTerminadoForm');
    }

    public function showPdfPreview($id) #vista completa para mostrar el pdf
    {
        // Buscar el documento PDF por su ID
        $pdfDocument = DB::table('trabajoacademico')->where('id_trabajoAcademico', $id)->first();

        // Verificar si se encontró el documento
        if (!$pdfDocument) {
            abort(404);
        }

        // Devolver la vista con el documento PDF
        return view('pdf.pdf_preview', ['pdfDocument' => $pdfDocument]);
    }

    public function showPdf($id) #Devuelve el contenido del PDF para mostrarlo en línea
    {
        // Buscar el documento PDF por su ID
        $pdfDocument = DB::table('trabajoacademico')->where('id_trabajoAcademico', $id)->first();

        // Verificar si se encontró el documento
        if (!$pdfDocument) {
            abort(404);
        }

        // Devolver el contenido del PDF para mostrarlo en línea
        return response()->stream(function () use ($pdfDocument) {
            echo $pdfDocument->contenido;
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $pdfDocument->titulo . '.pdf"',
        ]);
    }

    public function registrarTrabajoForm()
    {
        return view('trabajo.registrarTrabajoForm');
    }

    public function registrarTrabajo(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048', // Limita a archivos PDF con un tamaño máximo de 2MB
        ]);

        // Obtener el contenido del archivo PDF
        $pdfContent = file_get_contents($request->file('pdf_file')->getRealPath());

        // Guardar en la base de datos
        DB::table('trabajoacademico')->insert([
            'id_tipoTrabajo' => $request->input('tipoTrabajoAcademico'),
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_inicio' => $request->input('fechaInicio'),
            'id_area' => $request->input('area'),
            'contenido' => $pdfContent,
            'estatus' => 'En proceso de registro',
        ]);
        $trabajoId = DB::getPdo()->lastInsertId();
        $participantes = $request->input('integrantes', []);
        foreach ($participantes as $participante) {
            DB::table('estudiante')
                ->where('id_estudiante', $participante)
                ->update(['id_trabajoAcademico' => $trabajoId]);
        }
        return redirect()->back()->with('success', 'PDF subido correctamente.');
    }
}
