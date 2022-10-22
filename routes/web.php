<?php

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

/*---------------Rutas del Mododulo Perfil de usuario--------------------------------*/
// Route::get('estudiantes/listarestudiantes',[App\Http\Controllers\Modulo_PerfildeUsuario\EstudiantesController::class, 'listar_estudiantes'])->name('/estudiantes/listarestudiantes');

// Route::get('admin/estudiantes/estado/{id}/{estado}',[App\Http\Controllers\Modulo_PerfildeUsuario\EstudiantesController::class, 'cambiar_estado'])->name('/estudiantes/estado');

Route::get('admin/usuarios/create',[App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'create'])->name('usuarios.create');

Route::post('admin/usuarios',[App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'store'])->name('usuarios.store');

Route::get('admin/usuarios',[App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'index'])->name('usuarios.index');

Route::get('admin/usuarios/{usuario}',[App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'show'])->name('usuarios.show');

Route::get('admin/usuarios/{usuario}/edit',[App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'edit'])->name('usuarios.edit');

Route::put('usuarios/{usuario}',[App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'update'])->name('usuarios.update');

Route::get('admin/usuarios/{usuario}/editar',[App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'editar'])->name('usuarios.editar');

Route::put('admin/usuarios/{id}',[App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'actualizar'])->name('usuarios.actualizar');

Route::get('admin/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');

Route::post('admin/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

// Route::post('estudiantes.import',[App\Http\Controllers\Modulo_PerfildeUsuario\EstudiantesController::class, 'importar_estudiantes'])->name('estudiantes.import');

// Route::post('grupos.import',[App\Http\Controllers\Modulo_PerfildeUsuario\GruposController::class, 'importar_grupos'])->name('grupos.import');

// Route::post('profesores.import',[App\Http\Controllers\Modulo_PerfildeUsuario\ProfesoresController::class, 'importar_profesores'])->name('profesores.import');

/*---------------Fin Rutas del Mododulo Perfil de usuario--------------------------------*/

/*---------------Rutas del Mododulo Horario--------------------------------*/

Route::resource('Modulo_Horario.asignaturas', App\Http\Controllers\Modulo_Horario\AsignaturasController::class)->middleware('auth');

Route::resource('Modulo_Horario.horario', App\Http\Controllers\Modulo_Horario\HorarioController::class)->middleware('auth');

Route::resource('Modulo_Horario.balancedecarga', App\Http\Controllers\Modulo_Horario\BalancedecargaController::class)->middleware('auth');

Route::resource('Modulo_Horario.locales', App\Http\Controllers\Modulo_Horario\LocalesController::class)->middleware('auth');

Route::resource('Modulo_Horario.planificacion', App\Http\Controllers\Modulo_Horario\PlanificacionController::class)->middleware('auth');

Route::resource('Modulo_Horario.generarhorario', App\Http\Controllers\Modulo_Horario\GenerarHorarioController::class)->middleware('auth');

Route::resource('Modulo_Horario.afectaciones', App\Http\Controllers\Modulo_Horario\AfectacionesController::class)->middleware('auth');

// Route::resource('Modulo_Horario.horario', App\Http\Controllers\Modulo_Horario\BuscarController::class)->middleware('auth');

// Route::post('horario.index', [App\Http\Controllers\Modulo_Horario\BuscarController::class, 'index'])->name('horario.index');

Route::post('horario/buscar', action:[App\Http\Controllers\Modulo_Horario\BuscarController::class, 'buscar'])->name('horario/buscar');

Route::post('afectaciones/insertar', action:[App\Http\Controllers\Modulo_Horario\AfectacionesController::class, 'insertar'])->name('afectaciones/insertar');

Route::get('balancedecarga.export', [App\Http\Controllers\Modulo_Horario\BalancedecargaController::class, 'exportExcel'])->name('balancedecarga.export');

Route::post('generarhorario.generar', [App\Http\Controllers\Modulo_Horario\GenerarHorarioController::class, 'generar'])->name('generarhorario.generar');



/*---------------Fin Rutas del Mododulo Horario--------------------------------*/

/*---------------Rutas del Mododulo Optativas--------------------------------*/

Route::resource('Modulo_Optativas.optativa', App\Http\Controllers\Modulo_Optativas\OptativaController::class)->middleware('auth');

Route::resource('profesores','App\Http\Controllers\Modulo_Optativas\ProfesorController');

Route::resource('estudiantes','App\Http\Controllers\Modulo_Optativas\EstudianteController');

Route::resource('opt_prof','App\Http\Controllers\Modulo_Optativas\Opt_ProfController');

Route::resource('opt_est','App\Http\Controllers\Modulo_Optativas\Opt_EstController');

/*---------------Fin Rutas del Mododulo Optativas--------------------------------*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');