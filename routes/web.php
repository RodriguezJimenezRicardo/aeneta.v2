<?php

use App\Http\Controllers\Auth\UserAccessController;
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

Route::controller(UserAccessController::class)->group(function () {
    Route::get('/login', 'loginForm')->name('login');
    Route::post('/login', 'login'); //pensar en nombre, puede haber conflictos

    Route::get('/register', 'registerForm')->name('register');
    Route::post('/register', 'register')->name('save.register');
});

Route::match(['get', 'post'], 'logout', [UserAccessController::class, 'logout'])->name('logout');

Route::get('/prueba', function () {
    return view('prueba');
})->name('prueba');

Route::middleware(['auth', 'user.session'])->group(function () {
    Route::get('/prueba2', function () {
        return view('prueba');
    });
});

Route::controller(TrabajoAcademicoController::class)->group(function () {
    Route::get('/trabajoTerminal', 'index')->name('trabajo.index');
});
Route::controller(TrabajoAcademicoController::class)->group(function () {
    Route::get('/subirTrabajo', 'SubirTrabajo')->name('trabajo.subir');
});

Route::get('/SubirTerminado', [PdfDocumentController::class, 'SubirTerminadoForm'])->name('trabajo.subirTerminadoForm');
Route::post('/SubirTerminado', [PdfDocumentController::class, 'SubirTerminado'])->name('SubirTerminado');

Route::get('/RegistrarTrabajo', [PdfDocumentController::class, 'registrarTrabajoForm'])->name('trabajo.registrarTrabajoForm');
Route::post('/RegistrarTrabajo', [PdfDocumentController::class, 'registrarTrabajo'])->name('RegistrarTrabajo');

Route::get('/pdf/{id}/preview', [PdfDocumentController::class, 'showPdfPreview'])->name('pdf.preview'); #vista para mostrar el menu con el pdf
Route::get('/pdf/{id}/show', [PdfDocumentController::class, 'showPdf'])->name('pdf.show'); #muestra todo el pdf

#ruta de vista del administrador
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/agregarSinodal', [AdminController::class, 'agregarSinodal'])->name('admin.agregarSinodal');
Route::post('/admin/addSinodales', [AdminController::class, 'addSinodales'])->name('admin.addSinodales');

Route::get('/admin/ttDetails/{id}', [AdminController::class, 'ttDetails'])->name('admin.ttDetails');

Route::get('/estudiante', [EstudianteController::class, 'index'])->name('estudiante.index');

Route::get('/consultarTrabajos', [EstudianteController::class, 'consultarTrabajos'])->name('estudiante.consultarTrabajos');
