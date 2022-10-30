<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/asignaturas/{id}','App\Http\Controllers\Modulo_PerfildeUsuario\ProfesoresController@byAsignaturas');

Route::post('/opt_est/{id}','App\Http\Controllers\Modulo_Optativas\Opt_EstController@update');

Route::post('/horario','App\Http\Controllers\Modulo_Horario\BuscarController@buscar');

Route::get('/estudiantes/{id}','App\Http\Controllers\Modulo_PerfildeUsuario\EstudiantesController@byGrupos');

Route::get('/profesores/{id}','App\Http\Controllers\Modulo_PerfildeUsuario\ProfesoresController@byGrupos');

//Route::post('/create_pp','App/generar_horario/update_horario');

// Route::post('/afectaciones', 'App\Http\Controllers\Modulo_Horario\AfectacionesController@insertar');