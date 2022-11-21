<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController;
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
use App\Http\Controllers\Modulo_Horario\ParcialesController;
use App\Http\Controllers\Modulo_Actividades\ActividadesController;
use App\Http\Controllers\Modulo_Actividades\EvidenciasController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Modulo_ComisionDisciplinaria\Comision_DisciplinariaController;
use App\Http\Controllers\Modulo_ComisionDisciplinaria\DenunciaController;
use App\Http\Controllers\Modulo_ComisionDisciplinaria\ExpedienteController;
use App\Http\Controllers\Modulo_ComisionDisciplinaria\DeclaracionesController;
use App\Http\Controllers\Modulo_ComisionDisciplinaria\DenunciadoController;
use App\Http\Controllers\Modulo_ComisionDisciplinaria\OpinionesController;
use App\Http\Controllers\Modulo_ComisionDisciplinaria\DictamenController;
use App\Http\Controllers\Modulo_ComisionDisciplinaria\ReportController;
use App\Http\Controllers\Modulo_ComisionDisciplinaria\EvidenciaController;


Route::get('', [HomeController::class, 'index']);

Route::resource('asignaturas', AsignaturasController::class)->name('*', 'Modulo_Horario.asignaturas');

Route::resource('horario', HorarioController::class)->name('*', 'Modulo_Horario.horario');

Route::resource('balancedecarga', BalancedecargaController::class)->name('*', 'Modulo_Horario.balancedecarga');

Route::resource('locales', LocalesController::class)->name('*', 'Modulo_Horario.locales');

Route::resource('planificacion', PlanificacionController::class)->name('*', 'Modulo_Horario.planificacion');

Route::resource('generarhorario', GenerarHorarioController::class)->name('*', 'Modulo_Horario.generarhorario');

Route::resource('parciales', ParcialesController::class)->name('*', 'Modulo_Horario.parciales');

Route::resource('afectaciones', AfectacionesController::class)->name('*', 'Modulo_Horario.afectaciones');

Route::resource('optativa', OptativaController::class)->name('*', 'Modulo_Optativas.optativa');

/*---------------Rutas del Mododulo Perfil de usuario--------------------------------*/

Route::resource('usuarios', UsuariosController::class)->name('*','Modulo_PerfildeUsuario.usuarios');

Route::resource('diagnosticopreventivo', DiagnosticopreventivoController::class)->name('*', 'Modulo_PerfildeUsuario.diagnosticopreventivo');

Route::resource('grupos', GruposController::class)->name('*', 'Modulo_PerfildeUsuario.grupos');

Route::resource('estudiantes', EstudiantesController::class)->name('*', 'Modulo_PerfildeUsuario.estudiantes');

Route::resource('profesores', ProfesoresController::class)->name('*', 'Modulo_PerfildeUsuario.profesores');

Route::resource('roles', RolesController::class)->name('*', 'Modulo_PerfildeUsuario.roles');



Route::resource('actividades',ActividadesController::class)->name('*','Modulo_Actividades.actividades');
Route::post('actividades.form', 'Modulo_Actividades\ActividadesController@edit')->name('Modulo_Actividades.actividades');
Route::get('actividades.form', 'Modulo_Actividades\ActividadesController@edit')->name('Modulo_Actividades.actividades');



Route::resource('evidencias',EvidenciasController::class)->name('*','Modulo_Actividades.evidencias');
Route::post('evidencias.form', 'Modulo_Actividades\EvidenciasController@edit')->name('Modulo_Actividades.evidencias');
Route::get('evidencias.form', 'Modulo_Actividades\EvidenciasController@edit')->name('Modulo_Actividades.evidencias');

/*---------------Rutas del Mododulo Comisiones disciplinarias--------------------------------*/
Route::resource('Comision_disciplinaria', Comision_DisciplinariaController::class)->name('*','Modulo_ComisionDisciplinaria.Comision_disciplinaria');
Route::resource('Denuncia', DenunciaController::class)->name('*','Modulo_ComisionDisciplinaria.Denuncia');
Route::resource('Expediente', ExpedienteController::class)->name('*','Modulo_ComisionDisciplinaria.Expediente');
Route::resource('Declaraciones', DeclaracionesController::class)->name('*','Modulo_ComisionDisciplinaria.Declaraciones');
Route::resource('Denunciado', DenunciadoController::class)->name('*','Modulo_ComisionDisciplinaria.Denunciado');
Route::resource('Opiniones', OpinionesController::class)->name('*','Modulo_ComisionDisciplinaria.Opiniones');
Route::resource('Dictamen', DictamenController::class)->name('*','Modulo_ComisionDisciplinaria.Dictamen');
Route::resource('Report', ReportController::class)->name('*','Modulo_ComisionDisciplinaria.Report');
Route::resource('Evidencia', EvidenciaController::class)->name('*','Modulo_ComisionDisciplinaria.Evidencia');
/*---------------Fin Rutas del Mododulo Comisiones disciplinarias--------------------------------*/