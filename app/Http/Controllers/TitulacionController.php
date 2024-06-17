<?php

namespace App\Http\Controllers;

use App\Models\Titulacion;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TitulacionController extends Controller
{
    public function createT(Request $request)
    {
        $request->validate(
            [
                'tipo' => 'required|max:45',
                'desc' => 'required|max:500'
            ],
            [
                'tipo.required' => 'El tipo de titulación es requerido',
                'tipo.max' => 'Los caracteres máximos para el tipo de titulación es de 45',
                'desc.required' => 'El tipo de titulación es requerido',
                'desc.max' => 'Los caracteres máximos para la descripción es de 500',
            ]
        );
        try {
            $titulacion = new Titulacion();

            $titulacion->tipo = $request->tipo;
            $titulacion->descripcion = $request->desc;

            $titulacion->save();
        } catch (Exception $th) {
            return badRequest('Error al crear la forma de titulacion');
        }

        return redirect()->back()->with(['success' => 'Se creo la forma de titulación con éxito']);
    }

    public function updateT(Request $request)
    {
        $request->validate(
            [
                'tipoE' => 'required|max:45',
                'descE' => 'required|max:1000'
            ],
            [
                'tipoE.required' => 'El tipo de titulación es requerido',
                'tipoE.max' => 'Los caracteres máximos para el tipo de titulación es de 45',
                'descE.required' => 'El tipo de titulación es requerido',
                'descE.max' => 'Los caracteres máximos para la descripción es de 500',
            ]
        );
        try {
            $titulacion = Titulacion::findOrFail($request->id_titulacionE);
        } catch (ModelNotFoundException $e) {
            return badRequest('Forma de titulacion no encontrada');
        }
        $titulacion->tipo = $request->tipoE;
        $titulacion->descripcion = $request->descE;

        $titulacion->save();

        return redirect()->back()->with(['success' => 'Se actualizó la forma de titulación con éxito']);
    }

    public function destroy(Request $request)
    {
        try {
            $titulacion = Titulacion::findOrFail($request->id_titulacion);
        } catch (ModelNotFoundException $e) {
            return badRequest('Forma de titulacion no encontrada');
        }

        $titulacion->delete();

        return redirect()->back()->with(['success' => 'Se elimino la forma de titulación con éxito']);
    }
}
