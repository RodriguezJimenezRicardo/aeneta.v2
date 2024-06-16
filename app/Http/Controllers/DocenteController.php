<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Exception;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index(string $id_docente)
    {

        try {
            $docente = Docente::with('user')->findOrFail($id_docente);
        } catch (Exception $e) {
            return notFound('Docente no encontrado');
        }
        return view('docente.index', ['docente' => $docente]);
    }
}
