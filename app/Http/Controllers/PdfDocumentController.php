<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfDocumentController extends Controller
{
   

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

    
}
