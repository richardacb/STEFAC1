<?php

namespace App\Http\Controllers\Modulo_Horario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_Horario\Locales;
use Illuminate\Support\Facades\DB;
use App\Models\Modulo_Horario\Asignaturas;
use App\Models\Modulo_Horario\Grupo;
use App\Models\Modulo_PerfildeUsuario\Profesores;
use App\Models\Modulo_Horario\Balancedecarga;
use App\Models\Modulo_Horario\Prof_Grup_Asig;
use App\Models\Modulo_Horario\Horario;
use App\Models\Modulo_Horario\Asignaciones;
use App\Models\User;

class GenerarHorarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_Horario.generarhorario.index')->only('index');
        $this->middleware('can:Modulo_Horario.generarhorario.create')->only('create', 'store');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->put('anno', User::find(auth()->id())->anno);
        return view('Modulo_Horario.generarhorario.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anno = session()->get('anno');
        return view('Modulo_Horario.generarhorario.create', compact('anno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    // public function generar(Request $request){

    //     // $seccion = $request->get('seccion');
    //     // $anno = $request->get('anno');
    //     // $semana = $request->get('semana');
    //     // echo ("bdsf");

    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $seccion = $_POST["seccion"];
    //         $anno = $_POST["anno"];
    //         $semana = $_POST["semana"];
    //         return view('Modulo_Horario.generarhorario.index', compact('seccion','anno','semana'));

    //     }


    // }

    // public function buscar(Request $request){


    //     echo $request->get('seccion');
    //     echo $request->get('anno');
    //     echo  $request->get('semana');

    //     //return view('Modulo_Horario.generarhorario.index');
    // }
}