<?php

use Illuminate\Support\Facades\Route;

use App\Exports\BalancedecargaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\App;

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

Route::get('admin/usuarios/create', [App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'create'])->name('usuarios.create');

Route::post('admin/usuarios', [App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'store'])->name('usuarios.store');

Route::get('admin/usuarios', [App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'index'])->name('usuarios.index');

Route::get('admin/usuarios/{usuario}', [App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'show'])->name('usuarios.show');

Route::get('admin/usuarios/{usuario}/edit', [App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'edit'])->name('usuarios.edit');

Route::put('usuarios/{usuario}', [App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'update'])->name('usuarios.update');

Route::get('admin/usuarios/{usuario}/editar', [App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'editar'])->name('usuarios.editar');

Route::put('admin/usuarios/{id}', [App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'actualizar'])->name('usuarios.actualizar');

Route::get('admin/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');

Route::post('admin/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

Route::post('usuarios.import', [App\Http\Controllers\Modulo_PerfildeUsuario\UsuariosController::class, 'importar_usuarios'])->name('usuarios.import');

Route::get('/usuarios/pdf', [App\Http\Controllers\Modulo_PerfildeUsuario\GruposController::class, 'createPDF'])->name('usuarios.pdf');

Route::get('estudiantes.export', [App\Http\Controllers\Modulo_PerfildeUsuario\EstudiantesController::class, 'exportExcelEstudiantes'])->name('estudiantes.export');

// Route::get('profesores.export', [App\Http\Controllers\Modulo_PerfildeUsuario\ProfesoresController::class, 'exportExcelProfesores'])->name('profesores.export');

// Route::get('diagnosticopreventivo.export', [App\Http\Controllers\Modulo_PerfildeUsuario\DiagnosticopreventivoController::class, 'exportExcelDiagnosticopreventivo'])->name('diagnosticopreventivo.export');
/*---------------Fin Rutas del Mododulo Perfil de usuario--------------------------------*/

/*---------------Rutas del Mododulo Horario--------------------------------*/

Route::resource('Modulo_Horario.asignaturas', App\Http\Controllers\Modulo_Horario\AsignaturasController::class)->middleware('auth');

Route::resource('Modulo_Horario.horario', App\Http\Controllers\Modulo_Horario\HorarioController::class)->middleware('auth');

Route::resource('Modulo_Horario.balancedecarga', App\Http\Controllers\Modulo_Horario\BalancedecargaController::class)->middleware('auth');

Route::resource('Modulo_Horario.locales', App\Http\Controllers\Modulo_Horario\LocalesController::class)->middleware('auth');

Route::resource('Modulo_Horario.planificacion', App\Http\Controllers\Modulo_Horario\PlanificacionController::class)->middleware('auth');

Route::resource('Modulo_Horario.generarhorario', App\Http\Controllers\Modulo_Horario\GenerarHorarioController::class)->middleware('auth');

Route::resource('Modulo_Horario.afectaciones', App\Http\Controllers\Modulo_Horario\AfectacionesController::class)->middleware('auth');

Route::resource('Modulo_Horario.parciales', App\Http\Controllers\Modulo_Horario\ParcialesController::class)->middleware('auth');

// Route::resource('Modulo_Horario.horario', App\Http\Controllers\Modulo_Horario\BuscarController::class)->middleware('auth');

// Route::post('horario.index', [App\Http\Controllers\Modulo_Horario\BuscarController::class, 'index'])->name('horario.index');

Route::post('horario/buscar', action: [App\Http\Controllers\Modulo_Horario\BuscarController::class, 'buscar'])->name('horario/buscar');

Route::post('afectaciones/insertar', action: [App\Http\Controllers\Modulo_Horario\AfectacionesController::class, 'insertar'])->name('afectaciones/insertar');

Route::get('balancedecarga/export', 'App\Http\Controllers\Modulo_Horario\BalancedecargaController@exportExcel')->name('balancedecarga.export');

Route::get('balancedecarga/exportpdf', 'App\Http\Controllers\Modulo_Horario\BalancedecargaController@createPDF')->name('balancedecarga.exportpdf');
// Route::get('balancedecarga/export', function () {
//     return Excel::download(new BalancedecargaExport, 'products.xlsx');
// });


Route::post('generarhorario.generar', [App\Http\Controllers\Modulo_Horario\GenerarHorarioController::class, 'generar'])->name('generarhorario.generar');



/*---------------Fin Rutas del Mododulo Horario--------------------------------*/

/*---------------Rutas del Mododulo Optativas--------------------------------*/

Route::resource('Modulo_Optativas.optativa', App\Http\Controllers\Modulo_Optativas\OptativaController::class)->middleware('auth');

Route::resource('profesores', 'App\Http\Controllers\Modulo_Optativas\ProfesorController');

Route::resource('estudiantes', 'App\Http\Controllers\Modulo_Optativas\EstudianteController');

Route::resource('opt_prof', 'App\Http\Controllers\Modulo_Optativas\Opt_ProfController');

Route::resource('opt_est', 'App\Http\Controllers\Modulo_Optativas\Opt_EstController');

/*---------------Fin Rutas del Mododulo Optativas--------------------------------*/

/*---------------Rutas del Mododulo GECE--------------------------------*/

Route::get('cronograma', [App\Http\Controllers\ModuloGECE\CronogramaController::class, 'index'])->middleware('auth');
Route::post('cronograma/agregar', [App\Http\Controllers\ModuloGECE\CronogramaController::class, 'store'])->middleware('auth');
Route::resource('temas', 'App\Http\Controllers\Modulo_GECE\TemaController');
Route::resource('perfil', 'App\Http\Controllers\Modulo_GECE\PerfilController');
Route::resource('comite', 'App\Http\Controllers\Modulo_GECE\ComiteController');
Route::resource('deposito', 'App\Http\Controllers\Modulo_GECE\DepositoController');
Route::post('documento', [DocumentoController::class, 'store'])->name('documento.store');
Route::get('documento/{documento}/descargar', [DocumentoController::class, 'descargar'])->name('documento.descargar');
Route::resource('tribunaltaller', 'App\Http\Controllers\Modulo_GECE\TribunalTallerController');
Route::resource('tribunalpd', 'App\Http\Controllers\Modulo_GECE\TribunalPDController');
Route::resource('reportes', 'App\Http\Controllers\Modulo_GECE\ReporteController');
/*---------------Fin Rutas del Mododulo GECE--------------------------------*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
