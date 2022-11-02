<?php

namespace App\Http\Controllers\Modulo_Optativas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Opt_ProfController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Modulo_Optativas.opt_prof.index')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opt = DB::select('SELECT optativas.id, optativas.nombre, optativas.capacidad
                            FROM optativas
                            WHERE optativas.prof_principal = ' . auth()->id() . ' OR optativas.prof_auxiliar = ' . auth()->id() . '

        ')[0];


        $est_matriculados = DB::select('SELECT u.id,
        CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as nombre_est, e.name as grupo, u.anno, e.nota, e.id_est_opt
        FROM users as u INNER JOIN (SELECT e.user_id, g.name, oe.nota, oe.id as id_est_opt
                                    FROM estudiantes as e
                                    INNER JOIN opt_ests as oe ON e.user_id = oe.id_est
                                    INNER JOIN grupos as g ON e.grupos_id = g.id
                                    WHERE oe.id_opt = ' . $opt->id . ' ) as e
                                    ON u.id = e.user_id;
        ');

        $cant_est = sizeof($est_matriculados);
        
        return view('Modulo_Optativas.opt_prof.index')
            ->with('opt', $opt)
            ->with('cant_est', $cant_est)
            ->with('est_matriculados', $est_matriculados);

        // $opt_prof_est = DB::select('SELECT opt_ests.id_est, opt_prof.id_prof, opt_prof.nomb_opt, opt_prof.id_opt
        //                             FROM opt_ests INNER JOIN (SELECT p.id as id_prof, o.id as id_opt, o.nombre as nomb_opt
        //                                                         FROM profesors as p INNER JOIN (SELECT opt.id, opt.nombre
        //                                                                                         FROM optativas as opt
        //                                                                                         WHERE opt.prof_principal = '.auth()->id().' OR opt.prof_auxiliar = '.auth()->id().') as o
        //                                                                                         ON p.id = o.id ) as opt_prof
        //                                                                                         ON opt_ests.id_opt = opt_prof.id_opt

        //     ');

        // SELECT opt_ests.id_est
        // FROM opt_ests
        // INNER JOIN (SELECT p.nombre as nomb_prof, o.id as id_opt, o.nombre as nomb_opt
        //             FROM profesors as p INNER JOIN optativas as o ON p.id = o.prof_principal) as opt_prof
        //             ON opt_ests.id_opt = opt_prof.id_opt



        // SELECT optativas.id, optativas.nombre
        // FROM optativas
        // WHERE optativas.prof_principal = 1 OR optativas.prof_auxiliar = 1

        // SELECT p.nombre as nomb_prof, o.id as id_opt, o.nombre as nomb_opt
        // FROM profesors as p INNER JOIN optativas as o ON p.id = o.prof_principal

        // $opt_profs = Opt_Prof::all();
        // $datos = array();

        // foreach ($opt_profs as $opt_prof) {
        //     $id = $opt_prof->id;
        //     $opt = Optativa::find($opt_prof->id_opt)->nombre;
        //     $prof_1 = Profesor::find($opt_prof->id_prof_1)->nombre . " " . Profesor::find($opt_prof->id_prof_1)->apellido;
        //     $prof_2 = Profesor::find($opt_prof->id_prof_2)->nombre . " " . Profesor::find($opt_prof->id_prof_2)->apellido;

        //     array_push($datos, array("id" => $id, "opt" => $opt, "prof_1" => $prof_1, "prof_2" => $prof_2));
        // }
        // return view('opt_prof.index')
        //     ->with('infs', json_encode($datos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $opt_profs = Opt_Prof::all();
        // $optativas = Optativa::all();
        // $profesores = Profesor::all();

        // $opts = array();
        // foreach ($optativas as $optativa) {
        //     $flag_opt = false;
        //     foreach ($opt_profs as $opt_prof) {
        //         if ($optativa->id === $opt_prof->id_opt) {
        //             $flag_opt = true;
        //         }
        //     }
        //     if (!$flag_opt) {
        //         array_push($opts, $optativa);
        //     }
        // }

        // $profs = array();
        // foreach ($profesores as $profesor) {
        //     $flag_prof = false;
        //     foreach ($opt_profs as $opt_prof) {
        //         if ($profesor->id === $opt_prof->id_prof_1 || $profesor->id === $opt_prof->id_prof_2) {
        //             $flag_prof = true;
        //         }
        //     }
        //     if (!$flag_prof) {
        //         array_push($profs, $profesor);
        //     }
        // }

        // return view('opt_prof.create')
        //     ->with('optativas', $opts)
        //     ->with('profesores', $profs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $opt_profs = new Opt_Prof();
        // $opt_profs->id_opt = $request->get('id_opt');
        // $opt_profs->id_prof_1 = $request->get('id_prof_1');
        // $opt_profs->id_prof_2 = $request->get('id_prof_2');

        // $opt_profs->save();


        //return redirect('/opt_prof');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $opt_prof = Opt_Prof::find($id);
        // $optativas = Optativa::all();
        // $profesores = Profesor::all();

        // $id_opt = $opt_prof->id_opt;
        // $id_prof_1 = $opt_prof->id_prof_1;
        // $id_prof_2 = $opt_prof->id_prof_2;
        // $opt = Optativa::find($id_opt)->nombre;
        // $prof_1 = Profesor::find($opt_prof->id_prof_1)->nombre;
        // $prof_2 = Profesor::find($opt_prof->id_prof_2)->nombre;

        // $datos = array("id" => $id, "id_opt" => $id_opt, "opt" => $opt, "id_prof_1" => $id_prof_1, "prof_1" => $prof_1, "id_prof_2" => $id_prof_2, "prof_2" => $prof_2);

        // return view('opt_prof.edit')
        //     ->with('inf', json_encode($datos))
        //     ->with('optativas', $optativas)
        //     ->with('profesores', $profesores);
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
        // $opt_prof = Opt_Prof::find($id);

        // $opt_prof->id_opt = $request->get('id_opt');
        // $opt_prof->id_prof_1 = $request->get('id_prof_1');
        // $opt_prof->id_prof_2 = $request->get('id_prof_2');

        // $opt_prof->save();

        // return redirect('/opt_prof');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $opt_prof = Opt_Prof::find($id);
        // $opt_prof->delete();
        // return redirect('/opt_prof');
    }
}