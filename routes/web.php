<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\UserAccessController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PdfDocumentController;
use App\Http\Controllers\TitulacionController;
use App\Http\Controllers\TrabajoAcademicoController;
use App\Http\Controllers\BusquedaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/busqueda', function () {
    return view('Busqueda.busquedasimple');
})->name('Busqueda');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');


Route::get('/buscar', [BusquedaController::class, 'buscar'])->name('buscar.trabajos');

// Ruta para mostrar la vista de búsqueda avanzada
Route::get('/busqueda-avanzada', [BusquedaController::class, 'busquedaAvanzada'])->name('busqueda.avanzada');

// Ruta para manejar la búsqueda avanzada
Route::get('/buscar-avanzada', [BusquedaController::class, 'buscarAvanzada'])->name('buscar.trabajos.avanzada');


Route::controller(UserAccessController::class)->group(function () {
    Route::get('/login', 'loginForm')->name('login');
    Route::post('/login', 'login'); //pensar en nombre, puede haber conflictos

    Route::get('/register', 'registerForm')->name('register');
    Route::post('/register', 'register')->name('save.register');
});

Route::match(['get', 'post'], 'logout', [UserAccessController::class, 'logout'])->name('logout');




Route::get('/pdf/{id}/preview', [PdfDocumentController::class, 'showPdfPreview'])->name('pdf.preview'); #vista para mostrar el menu con el pdf
Route::get('/pdf/{id}/show', [PdfDocumentController::class, 'showPdf'])->name('pdf.show'); #muestra todo el pdf

#ruta de vista del administrador
Route::middleware(['auth', 'user.session'])->controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('/', 'index')->name('admin.index');

    Route::get('/accounts', 'accounts')->name('admin.accounts');

    Route::post('/addUser', 'addUser')->name('admin.addUser');

    Route::delete('/destroyUser', 'destroyUser')->name('admin.destroyUser');

    Route::get('/procesost', 'procesost')->name('admin.procesost');

    Route::get('/agregarSinodal/{id}', 'agregarSinodal')->name('admin.agregarSinodal');

    Route::post('/addSinodales', 'addSinodales')->name('admin.addSinodales');


    Route::get('/ttList', 'ttList')->name('admin.ttList');
    Route::get('/ttDetails/{id}', 'ttDetails')->name('admin.ttDetails');
    Route::get('/detalles/{id}', 'detalles')->name('Busqueda.detalles');


    Route::get('/SubirTerminado', 'subirTerminadoForm')->name('admin.subirTerminadoForm');
    Route::post('/SubirTerminado', 'subirTerminado')->name('admin.SubirTerminado');

    Route::post('/Aprobar/{id}/{aprobado}', 'aprobarRegistro')->name('admin.Aprobar');
});

Route::middleware(['auth', 'user.session'])->controller(TitulacionController::class)->prefix('admin')->group(function () {
    Route::post('/createT', 'createT')->name('titulacion.create');

    Route::post('/updateT', 'updateT')->name('titulacion.update');

    Route::delete('/destroy', 'destroy')->name('titulacion.destroy');
});

Route::middleware(['auth', 'user.session'])->controller(EstudianteController::class)->prefix('estudiante')->group(function () {
    Route::prefix('/{id_estudiante}')->group(function () {
        Route::get('/', 'index')->name('estudiante.index');

        Route::get('/consultarTrabajos', 'consultarTrabajos')->name('estudiante.consultarTrabajos');

        Route::get('/RegistrarTrabajo', 'registrarTrabajoForm')->name('estudiante.registrarTrabajoForm');

        Route::post('/RegistrarTrabajo', 'registrarTrabajo')->name('estudiante.RegistrarTrabajo');

        Route::get('/ttDetails/{id}', 'ttDetails')->name('estudiante.ttDetails');

        Route::post('/Aprobar/{id}/{aprobado}', 'AprobarRegistro')->name('estudiante.ConfirmarSinodales');

        Route::get('/procesost', 'procesost')->name('estudiante.procesost');
    });
});


Route::middleware(['auth', 'user.session'])->controller(DocenteController::class)->prefix('docente')->group(function () {
    Route::prefix('/{id_docente}')->group(function () {
        Route::get('/', 'index')->name('docente.index');
    });
});
