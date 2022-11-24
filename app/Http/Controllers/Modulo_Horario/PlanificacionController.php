<?php

namespace App\Http\Controllers\Modulo_Horario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_Horario\Planificacion;
use App\Models\Modulo_PerfildeUsuario\Profesores;
use App\Models\Modulo_PerfildeUsuario\Grupos;
use App\Models\Modulo_Horario\Asignaturas;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PlanificacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_Horario.planificacion.index')->only('index');
        $this->middleware('can:Modulo_Horario.planificacion.create')->only('create', 'store');
        $this->middleware('can:Modulo_Horario.planificacion.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_Horario.planificacion.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        session()->put('anno', User::find(auth()->id())->anno);
        $anno = session()->get('anno');



        // $profesores = DB::select('SELECT users.id, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as normbre_prof
        //                         FROM users INNER JOIN (SELECT profesores.user_id
        //                                                 FROM profesores INNER JOIN planificacions ON profesores.user_id = planificacions.profesores_id) as p ON
        //                                                 users.id = p.user_id WHERE users.anno = ' . session()->get('anno') . '');
        // $grupos = Grupos::all()->where('anno', session()->get('anno'));
        // $asignaturas = Asignaturas::all()->where('anno', session()->get('anno'));
        // $planificacion = Planificacion::all();
        if(User::find(auth()->id())->hasRole('Vicedecana')){

        $planificaciones = DB::select('SELECT p.id, prof.normbre_prof, g.name as grupo, a.nombre as asignatura
        FROM planificacions as p
        LEFT JOIN (SELECT users.id, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as normbre_prof
        FROM users INNER JOIN profesores ON users.id = profesores.user_id
        ) as prof ON p.profesores_id = prof.id

        INNER JOIN
        grupos as g ON p.grupos_id = g.id

        INNER JOIN
        asignaturas as a ON p.asignaturas_id = a.id

        ');
        }else{
            $planificaciones = DB::select('SELECT p.id, prof.normbre_prof, g.name as grupo, a.nombre as asignatura
            FROM planificacions as p
            LEFT JOIN (SELECT users.id, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as normbre_prof
            FROM users INNER JOIN profesores ON users.id = profesores.user_id
            WHERE users.anno = ' . $anno . ') as prof ON p.profesores_id = prof.id

            INNER JOIN
            grupos as g ON p.grupos_id = g.id

            INNER JOIN
            asignaturas as a ON p.asignaturas_id = a.id

            WHERE g.anno = ' . $anno . '
            AND a.anno = ' . $anno . '');
        }

        //var_dump($planificacion);

        return view('Modulo_Horario.planificacion.index', compact('planificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(User::find(auth()->id())->hasRole('Vicedecana')){
            $profesores = Profesores::all();
            $grupos = Grupos::all();
            $asignaturas = Asignaturas::all();
        }
        else{
            $profesores = Profesores::all();
            $grupos = Grupos::all()->where('anno', session()->get('anno'));
            $asignaturas = Asignaturas::all()->where('anno', session()->get('anno'));
        }
        return view('Modulo_Horario.planificacion.create', compact('profesores', 'grupos', 'asignaturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'asignaturas_id' => 'required|not_in:0',
            'profesores_id' => 'required|not_in:0',
            'grupos_id' => 'required|not_in:0',
        ];
        $messages = [
            'asignaturas_id.required' => 'Campo Requerido',
            'profesores_id.required' => 'Campo Requerido',
            'grupos_id.required' => 'Campo Requerido',
        ];
        $this->validate($request, $rules, $messages);

        // $suplente = DB::select('SELECT ');

        $planificacion = new Planificacion();
        $planificacion->profesores_id = $request->get('profesores_id');
        $planificacion->asignaturas_id = $request->get('asignaturas_id');
        $planificacion->grupos_id = $request->get('grupos_id');

        $planificacion->save();

        return redirect()->route('planificacion.index')->with('info', 'adicionar-planificacion');
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

        session()->put('anno', User::find(auth()->id())->anno);
        $anno  = session()->get('anno');

        $select_anno = DB::select('SELECT a.anno
        FROM planificacions as p INNER JOIN asignaturas as a ON p.asignaturas_id = a.id
        WHERE p.id = ' . $id . '');

        if ($anno === $select_anno[0]->anno || (User::find(auth()->id())->hasRole('Vicedecana'))) {
            $planificacion = Planificacion::find($id);
            $profesores = Profesores::all();
            $grupos = Grupos::all();
            $asignaturas = Asignaturas::all();

            return view('Modulo_Horario.planificacion.edit', compact('profesores', 'grupos', 'asignaturas', 'planificacion'));
        } else {
            abort(401);
        }
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
        $rules = [
            'profesores_id' => 'required|not_in:0',
            'asignaturas_id' => 'required|not_in:0',
            'grupos_id' => 'required|not_in:0',
        ];
        $messages = [
            'profesores_id.required' => 'Campo Requerido',
            'asignaturas_id.required' => 'Campo Requerido',
            'grupos_id.required' => 'Campo Requerido',
        ];
        $this->validate($request, $rules, $messages);

        $planificacion = Planificacion::findOrFail($id);

        $planificacion->profesores_id = $request->get('profesores_id');
        $planificacion->asignaturas_id = $request->get('asignaturas_id');
        $planificacion->grupos_id = $request->get('grupos_id');

        $request->validate([
            'profesores_id' => 'required',
            'asignaturas_id' => 'required',
            'grupos_id' => 'required',

        ]);

        $planificacion->update($request->all());

        return redirect()->route('planificacion.index')->with('info', 'modificar-planificacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planificacion $planificacion)
    {
        $planificacion->delete();
        return redirect()->route('planificacion.index')->with('info', 'eliminar-planificacion');
    }
}
