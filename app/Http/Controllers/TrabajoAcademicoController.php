<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrabajoAcademicoController extends Controller
{
    //
    public function create()
    {
        return view('postulations.create');
    }

    public function index()
    {
        return "HOLA";
    }
}
