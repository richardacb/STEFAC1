<?php

namespace App\Http\Controllers\Modulo_Optativas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_Optativas\Estudiante;
use App\Models\Modulo_Optativas\Optativa;
use App\Models\Modulo_PerfildeUsuario\Profesores;
use App\Models\Modulo_Optativas\OptEst;
use App\Models\Modulo_Optativas\EstEstado;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Opt_EstController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_Optativas.opt_est.index')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->put('anno', User::find(auth()->id())->anno);
        session()->put('semestre', DB::select('SELECT estudiantes.periodo_lectivo FROM estudiantes WHERE estudiantes.user_id = ' . auth()->id() . '')[0]);
        $anno = session()->get('anno');
        $semestre = session()->get('anno');

        $optativas = DB::select('SELECT o.id, o.nombre, o.descripcion, o.capacidad, o.anno_academico, o.semestre, o.estado,
        CONCAT(pp.primer_nombre," ",pp.segundo_nombre," ",pp.primer_apellido," ",pp.segundo_apellido) as prof_principal,
        CONCAT(pa.primer_nombre," ",pa.segundo_nombre," ",pa.primer_apellido," ",pa.segundo_apellido) as prof_auxiliar
        FROM optativas as o

        LEFT JOIN
        (SELECT users.id, users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido
        FROM users INNER JOIN profesores ON users.id = profesores.user_id) as pp ON o.prof_principal = pp.id

        LEFT JOIN
        (SELECT users.id, users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido
        FROM users INNER JOIN profesores ON users.id = profesores.user_id) as pa ON o.prof_auxiliar = pa.id
        WHERE o.anno_academico = ' . $anno . ' AND o.semestre = ' . $semestre . '
        AND o.id NOT IN (SELECT opt_ests.id_opt FROM opt_ests WHERE opt_ests.id_est = ' . auth()->id() . ' AND opt_ests.estado = 1 AND opt_ests.nota <> 0 )');

        $opt_mat = array();
        $opt_matriculadas = DB::table('opt_ests')->where('id_est', auth()->id())->get('id_opt');

        if ($opt_matriculadas) {
            foreach ($opt_matriculadas as $opt_matriculada) {
                array_push($opt_mat, $opt_matriculada->id_opt);
            }
        } else {
            array_push($opt_mat, 0);
        }


        $datos = array();

        foreach ($optativas as $opt) {
            $id = $opt->id;
            $nombre = $opt->nombre;
            $opt_cap = $opt->capacidad;
            $opt_cant = count(DB::table('opt_ests')->where('id_opt', $id)->get());
            $prof_1 = $opt->prof_principal;
            $prof_2 = $opt->prof_auxiliar;

            array_push($datos, array(
                "id_opt" => $id,
                "opt" => $nombre,
                "prof_1" => $prof_1,
                "disp" => $opt_cap > $opt_cant ? 'si' : 'no',
                "prof_2" => $prof_2,
                "id_est" => auth()->id()
            ));
        }

        return view('Modulo_Optativas.opt_est.index')
            ->with('infs', json_encode($datos))
            ->with('id_opts', $opt_mat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$est_estado = DB::table('est_estados')->where('estado', 'En Curso')->get('id')[0];
        // $matriculado_por = OptEst::findOrFail($id);

        $opt_est = new OptEst();
        $opt_est->id_opt = $request->get('id_opt');
        $opt_est->id_est = $request->get('id_est');
        $opt_est->estado = 0;
        $opt_est->nota = 0;
        $opt_est->matriculado_por = auth()->id();

        $opt_est->save();

        if ($request->get('show')) {
            return redirect()->route('optativa.show', $request->get('id_opt'));
        }
        return redirect()->route('opt_est.index')->with('info', 'adicionar-optativa_estudiante');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $cant_opt = count(DB::table('opt_ests')->where('id_est', $id)->get());
        // return view('Modulo_Optativas.opt_est.show', compact('cant_opt'));
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

        // $value = explode('+', $id);
        // echo $value[0];
        // echo $value[1];
        $opt_est = OptEst::find($id);

        $opt_est->nota = $request->nota > 0 ? $request->nota : 0;
        $opt_est->estado = $request->nota > 0 ? 1 : 0;
        $opt_est->save();

        //return redirect()->route('opt_prof.index')->with('info', 'modificar-optativa_prof');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $value = explode('+', $id);
        $opt_est = DB::table('opt_ests')->where('id_opt', $value[0])->where('id_est', $value[1])->value('id');
        $opt_est = OptEst::find($opt_est);
        $matriculado_por = DB::table('opt_ests')->where('id_opt', $value[0])->where('id_est', $value[1])->value('matriculado_por');

        if ($value[2] == 'show') {
            $opt_est->delete();
            return redirect()->route('optativa.show', $value[0]);
        }
        if ($value[2] == 'index') {
            if ($matriculado_por == $value[1]) {
                $opt_est->delete();
                return redirect()->route('opt_est.index')->with('info', 'eliminar-optativa_estudiante');
            } else {
                return redirect()->route('opt_est.index')->with('info', 'no_puede_desmatricular');
            }
        }
    }
}
