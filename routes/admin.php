<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

//use App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController;
use App\Http\Controllers\Modulo_PerfildeUsuario\GruposController;
use App\Http\Controllers\Modulo_PerfildeUsuario\EstudiantesController;
use App\Http\Controllers\Modulo_PerfildeUsuario\ProfesoresController;
use App\Http\Controllers\Modulo_PerfildeUsuario\RolesController;
use App\Http\Controllers\Modulo_PerfildeUsuario\DiagnosticopreventivoController;
use App\Http\Controllers\Modulo_Horario\AsignaturasController;
use App\Http\Controllers\Modulo_Horario\HorarioController;
use App\Http\Controllers\Modulo_Horario\BalancedecargaController;
use App\Http\Controllers\Modulo_Horario\GenerarHorarioController;
use App\Http\Controllers\Modulo_Horario\AfectacionesController;
use App\Http\Controllers\Modulo_Horario\LocalesController;
use App\Http\Controllers\Modulo_Horario\PlanificacionController;
use App\Http\Controllers\Modulo_Optativas\OptativaController;
//use App\Http\Controllers\Auth\RegisterController;


Route::get('', [HomeController::class, 'index']);

Route::resource('asignaturas', AsignaturasController::class)->name('*','Modulo_Horario.asignaturas');

Route::resource('horario', HorarioController::class)->name('*','Modulo_Horario.horario');

Route::resource('balancedecarga', BalancedecargaController::class)->name('*','Modulo_Horario.balancedecarga');

Route::resource('locales', LocalesController::class)->name('*','Modulo_Horario.locales');

Route::resource('planificacion', PlanificacionController::class)->name('*','Modulo_Horario.planificacion');

Route::resource('generarhorario', GenerarHorarioController::class)->name('*','Modulo_Horario.generarhorario');

Route::resource('afectaciones', AfectacionesController::class)->name('*','Modulo_Horario.afectaciones');

Route::resource('optativa', OptativaController::class)->name('*','Modulo_Optativas.optativa');

/*---------------Rutas del Mododulo Perfil de usuario--------------------------------*/

//Route::resource('usuarios', UsuariosController::class)->name('*','Modulo_PerfildeUsuario.usuarios');

Route::resource('diagnosticopreventivo', DiagnosticopreventivoController::class)->name('*','Modulo_PerfildeUsuario.diagnosticopreventivo');

Route::resource('grupos', GruposController::class)->name('*','Modulo_PerfildeUsuario.grupos');

Route::resource('estudiantes', EstudiantesController::class)->name('*','Modulo_PerfildeUsuario.estudiantes');

Route::resource('profesores', ProfesoresController::class)->name('*','Modulo_PerfildeUsuario.profesores');

Route::resource('roles', RolesController::class)->name('*','Modulo_PerfildeUsuario.roles');



/*---------------Fin Rutas del Mododulo Perfil de usuario--------------------------------*/