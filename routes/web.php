<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfesorExamenController;
use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

//Rutas de Administrador
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/crear', [AdminController::class, 'vistaFormulario'])->name('form_crear');
    Route::post('/admin/crear', [AdminController::class, 'crearProfesor'])->name('crear_usuario');

    Route::get('/admin/editar/{id}', [AdminController::class, 'editFormulario'])->name('form_editar');
    Route::put('/admin/editar/{id}', [AdminController::class, 'editarUsuario'])->name('editar_usuario');

    Route::get('/admin/status/{id}', [AdminController::class, 'statusUsuario'])->name('cambiar_status');
});

Route::group(['middleware' => 'alumno'], function () {
    //Rutas de Alumno
    Route::get('/alumno/listado', [AlumnoController::class, 'realizados'])->name('examenes_realizados');
    Route::get('/alumno/examenes', [AlumnoController::class, 'listadoExamenes'])->name('listado_alumno');

    Route::get('/alumno/realizarexamen/{id}', [AlumnoController::class, 'examenRealizar'])->name('realizar_examen');
    Route::post('/alumno/realizarexamen/{id}', [AlumnoController::class, 'corregirExamen'])->name('corregir_examen');

    Route::get('/alumno/verexamen/{id}', [AlumnoController::class, 'verExamen'])->name('ver_examen');
});

//Rutas de Profesor
Route::group(['middleware' => 'profesor'], function () {

    Route::get('/profesor/examenes', [ProfesorExamenController::class, 'verExamenes']);
    Route::post('/profesor/examenes', [ProfesorExamenController::class, 'index']);

    Route::get('/profesor/examenes/{id}', [ProfesorExamenController::class, 'examen']);
    Route::post('/profesor/examenes/{id}', [ProfesorExamenController::class, 'edit']);

    Route::get('/profesor/edit/{id}', [ProfesorExamenController::class, 'edit2'])->name('actualizar');
    Route::post('/profesor/edit/{id}', [ProfesorExamenController::class, 'update']);

    Route::get('/profesor/crearexamen', [ProfesorExamenController::class, 'create2']);
    Route::post('/profesor/crearexamen', [ProfesorExamenController::class, 'crearexamen'])->name('crear');

    Route::get('/profesor/crearexamen/{examenId}/preguntas/', [ProfesorExamenController::class, 'crearPreguntas'])->name('preguntas');
    Route::post('/profesor/crearexamen/{examenId}/preguntas/', [ProfesorExamenController::class, 'preguntasSave'])->name('savePreg');
});
