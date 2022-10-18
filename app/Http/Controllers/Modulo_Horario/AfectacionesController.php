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

        $afectaciones = DB::select('SELECT a.id, afect.afectado, supl.suplente, a.anno, a.semana, a.dia, a.turno
        FROM afectaciones as a
        INNER JOIN
        (SELECT a.profesores_afectados_id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as afectado
        FROM users as u INNER JOIN afectaciones as a ON u.id = a.profesores_afectados_id) as afect ON a.profesores_afectados_id = afect.profesores_afectados_id
        INNER JOIN
        (SELECT a.profesores_suplentes_id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as suplente
        FROM users as u INNER JOIN afectaciones as a ON u.id = a.profesores_suplentes_id) as supl ON a.profesores_suplentes_id = supl.profesores_suplentes_id
        WHERE a.anno = ' . session()->get('anno') . '');

        return view('Modulo_Horario.afectaciones.index', compact('afectaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesores = DB::select('SELECT users.id, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_profesor
        FROM users
        INNER JOIN profesores ON users.id = profesores.user_id WHERE users.anno = ' . session()->get('anno') . '
        ');

        return view('Modulo_Horario.afectaciones.create', compact('profesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $afectaciones->profesores_afectados_id = $request->get('profesor_afectado_id');
        $afectaciones->profesores_suplentes_id = $request->get('profesor_suplente_id');
        $afectaciones->semana = $request->get('semana');
        $afectaciones->turno = $request->get('turno');
        $afectaciones->anno = $request->get('anno');
        $afectaciones->dia = $request->get('dia');

        //$afectaciones->save();

        $intercambiar = DB::select('SELECT a.id
                                            FROM asignaciones as a
                                            WHERE a.planificacion_id IN (SELECT p.id FROM planificacions as p WHERE p.profesores_id = ' . $request->get('profesor_afectado_id') . ')
                                            AND a.disponibilidad_id IN (SELECT d.id FROM disponibilidad as d WHERE d.dia = ' . $request->get('dia') . ' AND d.turno = ' . $request->get('turno') . ')
                                            AND a.anno = ' . $request->get('anno') . '
                                            AND a.semana = ' . $request->get('semana') . '')[0];

        //var_dump($intercambiar->id);

        foreach ($intercambiar as $i) {
            $p = DB::select('SELECT p.asignaturas_id, p.grupos_id
                                    FROM planificacions as p
                                    WHERE p.id = (SELECT a.planificacion_id FROM asignaciones as a
                                                    WHERE a.id = ' . $i . ')')[0];
            //var_dump($i);

            $planificacion = new Planificacion();
            $planificacion->profesores_id = $request->get('profesor_suplente_id');
            $planificacion->asignaturas_id = $p->asignaturas_id;
            $planificacion->grupos_id = $p->grupos_id;


            DB::insert('insert into planificacions (profesores_id, asignaturas_id, grupos_id) values (?, ?, ?)', [$planificacion->profesores_id, $planificacion->asignaturas_id, $planificacion->grupos_id]);


            $id_planif = DB::select('SELECT MAX(p.id) as id FROM planificacions as p')[0];
            //var_dump($id_planif->id);

            DB::update('UPDATE asignaciones as a SET a.planificacion_id = ' . $id_planif->id . ' WHERE a.id =' . $i . '');
        }


        $afectaciones->save();
        return redirect()->route('afectaciones.index', $afectaciones)->with('info', 'adicionar-afectacion');
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
        $afectacion = Afectaciones::find($id);
        $profesores = Profesores::all();

        $profesor = DB::select('SELECT profesores.*
        FROM profesores
        WHERE profesores.id NOT IN (SELECT afectaciones.profesores_afectados_id
                                    FROM afectaciones
                                    WHERE afectaciones.profesores_afectados_id <> ' . $afectacion->profesores_afectados_id . '
                                    UNION
                                    SELECT afectaciones.profesores_suplentes_id
                                    FROM afectaciones
                                    WHERE afectaciones.profesores_suplentes_id <> ' . $afectacion->profesores_suplentes_id . ')
');
        // $dia = DB::select('SELECT afectaciones.*
        // FROM afectaciones
        // WHERE afectaciones.dia');


        return view('Modulo_Horario.afectaciones.edit', compact('afectacion', 'profesores', 'profesor'));
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
            'profesor_suplente_id' => 'required|not_in:0',
            'semana' => 'required',
            'dia' => 'required|not_in:0',
        ];
        $messages = [
            'profesor_id.required' => 'Campo Requerido',
            'profesor_suplente_id.required' => 'Campo Requerido',
            'semana.required' => 'Campo Requerido',
            'dia.required' => 'Campo Requerido',
        ];
        $this->validate($request, $rules, $messages);

        $afectacion = Afectaciones::findOrFail($id);
        $afectacion->profesores_afectados_id = $request->get('profesor_id');
        $afectacion->profesores_suplentes_id = $request->get('profesor_suplente_id');
        $afectacion->semana = $request->get('semana');
        $afectacion->dia = $request->get('dia');

        $afectacion->update($request->all());

        return redirect()->route('afectaciones.index', compact('afectacion'))->with('info', 'modificar-afectacion');
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

        $intercambiar = DB::select('SELECT a.*
        FROM asignaciones as a
        WHERE a.planificacion_id IN (SELECT p.id FROM planificacions as p WHERE p.profesores_id = ' . $afectacion->profesores_suplentes_id . ')
        AND a.disponibilidad_id IN (SELECT d.id FROM disponibilidad as d WHERE d.dia = ' . $afectacion->dia . ' AND d.turno = ' . $afectacion->turno . ')
        AND a.anno = ' . $afectacion->anno . '
        AND a.semana = ' . $afectacion->semana . '');

        //var_dump($intercambiar);

        foreach ($intercambiar as $i) {
            //var_dump($i->id);
            $p = DB::select('SELECT p.*
            FROM planificacions as p
            WHERE p.id = (SELECT a.planificacion_id FROM asignaciones as a
                            WHERE a.id = ' . $i->id . ')')[0];
            //var_dump($p);
            $pl = DB::select('SELECT p.id
                        FROM planificacions as p
                        WHERE p.profesores_id = ' . $afectacion->profesores_afectados_id . '
                        AND p.asignaturas_id = ' . $p->asignaturas_id . ' AND p.grupos_id = ' . $p->grupos_id . '')[0];

            //$id_planif = DB::select('SELECT MAX(p.id) as id FROM planificacions as p')[0];
            var_dump($pl->id);

            DB::update('UPDATE asignaciones as a SET a.planificacion_id = ' . $pl->id . ' WHERE a.id =' . $i->id . '');

            DB::delete('DELETE
            FROM planificacions
            WHERE planificacions.profesores_id = ' . $afectacion->profesores_suplentes_id . '
            AND planificacions.asignaturas_id = ' . $p->asignaturas_id . '
            AND planificacions.grupos_id = ' . $p->grupos_id . '');
        }

        $afectacion->delete();

        return redirect()->route('afectaciones.index')->with('info', 'eliminar-afectacion');
    }
}
