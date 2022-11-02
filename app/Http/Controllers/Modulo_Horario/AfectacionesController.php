<?php

namespace App\Http\Controllers\Modulo_Horario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_Horario\Afectaciones;
use App\Models\Modulo_Horario\Asignaturas;
use App\Models\Modulo_Horario\Planificacion;
use App\Models\Modulo_PerfildeUsuario\Profesores;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class AfectacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_Horario.afectaciones.index')->only('index');
        $this->middleware('can:Modulo_Horario.afectaciones.create')->only('create', 'store');
        $this->middleware('can:Modulo_Horario.afectaciones.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_Horario.afectaciones.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->put('anno', User::find(auth()->id())->anno);

        $anno  = session()->get('anno');

        $afectaciones = DB::select('SELECT a.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as afectado, a.anno, a.semana, a.dia, a.turno
        FROM users as u INNER JOIN (SELECT a.* FROM afectaciones as a WHERE a.anno = ' . $anno . ') as a ON u.id = a.profesores_afectados_id');

        if(User::find(auth()->id())->hasRole('Vicedecana')){
        $afectaciones = DB::select('SELECT a.id, afect.afectado, a.anno, a.semana, a.dia, a.turno
        FROM afectaciones as a
        INNER JOIN
        (SELECT a.profesores_afectados_id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as afectado
        FROM users as u INNER JOIN afectaciones as a ON u.id = a.profesores_afectados_id) as afect ON a.profesores_afectados_id = afect.profesores_afectados_id
       ');
        }else{
            $afectaciones = DB::select('SELECT a.id, afect.afectado, a.anno, a.semana, a.dia, a.turno
            FROM afectaciones as a
            INNER JOIN
            (SELECT a.profesores_afectados_id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as afectado
            FROM users as u INNER JOIN afectaciones as a ON u.id = a.profesores_afectados_id) as afect ON a.profesores_afectados_id = afect.profesores_afectados_id
            WHERE a.anno = ' . session()->get('anno') . '');
        }

        return view('Modulo_Horario.afectaciones.index', compact('afectaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session()->put('anno', User::find(auth()->id())->anno);
        $anno  = session()->get('anno');
        if(User::find(auth()->id())->hasRole('Vicedecana')){
        $profesores = DB::select('SELECT users.id, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_profesor
        FROM users
        INNER JOIN profesores ON users.id = profesores.user_id
        ');
        }else{
            $profesores = DB::select('SELECT users.id, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_profesor
            FROM users
            INNER JOIN profesores ON users.id = profesores.user_id WHERE users.anno = ' . $anno  . '
            ');
        }

        return view('Modulo_Horario.afectaciones.create', compact('profesores', 'anno'));
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
    public function insertar(Request $request)
    {
        // $rules = [
        //     'profesor_id' => 'required|not_in:0',
        //     'profesor_suplente_id' => 'required|not_in:0',
        //     'semana' => 'required',
        //     'dia' => 'required|not_in:0',
        //      ];
        //      $messages = [
        //         'profesor_id.required' =>'Campo Requerido',
        //         'profesor_suplente_id.required' =>'Campo Requerido',
        //         'semana.required' =>'Campo Requerido',
        //         'dia.required' =>'Campo Requerido',
        //      ];
        //      $this->validate( $request, $rules, $messages);


        $afectaciones = new Afectaciones();
        $afectaciones->profesores_afectados_id = $request->profesor_afectado_id;
        $afectaciones->semana = $request->semana;
        $afectaciones->turno = $request->turno;
        $afectaciones->anno = $request->anno;
        $afectaciones->dia = $request->dia;

        // $profesor_afectado_id =  $request->profesor_afectado_id;
        // $semana = $request->semana;
        // $turno = $request->turno;
        // $anno = $request->anno;
        // $dia = $request->dia;

        // echo ($profesor_afectado_id);
        // echo ($semana);
        // echo ($turno);
        // echo ($anno);
        // echo ($dia);
        //$afectaciones->save();

        DB::update('UPDATE asignaciones as a SET a.estado = 0
        WHERE a.planificacion_id IN (SELECT p.id FROM planificacions as p WHERE p.profesores_id = ' . $request->profesor_afectado_id . ')
        AND a.disponibilidad_id IN (SELECT d.id FROM disponibilidad as d WHERE d.dia = ' . $request->dia . ' AND d.turno = ' . $request->turno . ')
        AND a.anno = ' . $request->anno . '
        AND a.semana = ' . $request->semana . '');



        //var_dump($intercambiar->id);

        // foreach ($intercambiar as $i) {
        //     $p = DB::select('SELECT p.asignaturas_id, p.grupos_id
        //                             FROM planificacions as p
        //                             WHERE p.id = (SELECT a.planificacion_id FROM asignaciones as a
        //                                             WHERE a.id = ' . $i . ')')[0];
        //     //var_dump($i);

        //     $planificacion = new Planificacion();
        //     $planificacion->profesores_id = $request->get('profesor_suplente_id');
        //     $planificacion->asignaturas_id = $p->asignaturas_id;
        //     $planificacion->grupos_id = $p->grupos_id;


        //     DB::insert('insert into planificacions (profesores_id, asignaturas_id, grupos_id) values (?, ?, ?)', [$planificacion->profesores_id, $planificacion->asignaturas_id, $planificacion->grupos_id]);


        //     $id_planif = DB::select('SELECT MAX(p.id) as id FROM planificacions as p')[0];
        //     //var_dump($id_planif->id);

        //     DB::update('UPDATE asignaciones as a SET a.planificacion_id = ' . $id_planif->id . ' WHERE a.id =' . $i . '');
        // }


        $afectaciones->save();
        //return redirect()->route('afectaciones.index', $afectaciones)->with('info', 'adicionar-afectacion');
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

        $afectacion = Afectaciones::find($id);

        if ($anno === $afectacion->anno || (User::find(auth()->id())->hasRole('Vicedecana'))) {
            $profesores = Profesores::all();
            $asignatura = Asignaturas::find($id);

            $profesor = DB::select('SELECT users.id, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_profesor
        FROM users INNER JOIN (SELECT profesores.user_id
                                FROM profesores
                                WHERE profesores.id NOT IN (SELECT afectaciones.profesores_afectados_id
                                                FROM afectaciones
                                                WHERE afectaciones.profesores_afectados_id <> ' . $afectacion->profesores_afectados_id . ')) as profesores ON users.id = profesores.user_id
        ');


            return view('Modulo_Horario.afectaciones.edit', compact('afectacion', 'profesores', 'profesor', 'anno'));
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
            'profesor_id' => 'required|not_in:0',
            'semana' => 'required',
            'dia' => 'required|not_in:0',
            'anno' => 'required'
        ];
        $messages = [
            'profesor_id.required' => 'Campo Requerido',
            'semana.required' => 'Campo Requerido',
            'dia.required' => 'Campo Requerido',
            'anno.required' => 'Campo Requerido'
        ];
        $this->validate($request, $rules, $messages);

        $afectacion = Afectaciones::findOrFail($id);
        $afectacion->profesores_afectados_id = $request->get('profesor_id');
        $afectacion->semana = $request->get('semana');
        $afectacion->dia = $request->get('dia');
        $afectacion->anno = $request->get('anno');
        $afectacion->turno = $request->get('turno');


        $afectacion->update($request->all());

        return redirect()->route('afectaciones.index')->with('info', 'modificar-afectacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $afectacion = Afectaciones::findOrFail($id);

        // DB::select('UPDATE asignaciones as a SET a.estado = 1
        // WHERE a.planificacion_id IN (SELECT p.id FROM planificacions as p WHERE p.profesores_id = ' . $afectacion->profesores_afectados_id. ')
        // AND a.disponibilidad_id IN (SELECT d.id FROM disponibilidad as d WHERE d.dia = ' . $afectacion->dia . ' AND d.turno = ' . $afectacion->turno . ')
        // AND a.anno = ' . $afectacion->anno . '
        // AND a.semana = ' . $afectacion->semana . '');

        // $intercambiar = DB::select('SELECT a.*
        // FROM asignaciones as a
        // WHERE a.planificacion_id IN (SELECT p.id FROM planificacions as p WHERE p.profesores_id = ' . $afectacion->profesores_suplentes_id . ')
        // AND a.disponibilidad_id IN (SELECT d.id FROM disponibilidad as d WHERE d.dia = ' . $afectacion->dia . ' AND d.turno = ' . $afectacion->turno . ')
        // AND a.anno = ' . $afectacion->anno . '
        // AND a.semana = ' . $afectacion->semana . '');

        // //var_dump($intercambiar);

        // foreach ($intercambiar as $i) {
        //     //var_dump($i->id);
        //     $p = DB::select('SELECT p.*
        //     FROM planificacions as p
        //     WHERE p.id = (SELECT a.planificacion_id FROM asignaciones as a
        //                     WHERE a.id = ' . $i->id . ')')[0];
        //     //var_dump($p);
        //     $pl = DB::select('SELECT p.id
        //                 FROM planificacions as p
        //                 WHERE p.profesores_id = ' . $afectacion->profesores_afectados_id . '
        //                 AND p.asignaturas_id = ' . $p->asignaturas_id . ' AND p.grupos_id = ' . $p->grupos_id . '')[0];

        //     //$id_planif = DB::select('SELECT MAX(p.id) as id FROM planificacions as p')[0];
        //     var_dump($pl->id);

        //     DB::update('UPDATE asignaciones as a SET a.planificacion_id = ' . $pl->id . ' WHERE a.id =' . $i->id . '');

        //     DB::delete('DELETE
        //     FROM planificacions
        //     WHERE planificacions.profesores_id = ' . $afectacion->profesores_suplentes_id . '
        //     AND planificacions.asignaturas_id = ' . $p->asignaturas_id . '
        //     AND planificacions.grupos_id = ' . $p->grupos_id . '');
        // }

        $afectacion->delete();

        return redirect()->route('afectaciones.index')->with('info', 'eliminar-afectacion');
    }
}