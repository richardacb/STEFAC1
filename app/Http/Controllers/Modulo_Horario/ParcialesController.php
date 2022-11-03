<?php

namespace App\Http\Controllers\Modulo_Horario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_Horario\Asignaturas;
use App\Http\Controllers\Modulo_Horario\AsignaturasController;
use App\Models\Modulo_PerfildeUsuario\Grupos;
use App\Models\Modulo_Horario\Parciales;
use App\Models\Modulo_Horario\Planificacion;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ParcialesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_Horario.parciales.index')->only('index');
        $this->middleware('can:Modulo_Horario.parciales.create')->only('create', 'store');
        $this->middleware('can:Modulo_Horario.parciales.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_Horario.parciales.destroy')->only('destroy');
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
        if(User::find(auth()->id())->hasRole('Vicedecana')){
        $parciales = DB::select('SELECT pp.id, a.nombre, pp.anno, pp.semestre, pp.dia, pp.turno, pp.semana
        FROM pruebasparciales as pp INNER JOIN asignaturas as a ON pp.asignaturas_id = a.id
        ');
         }else{
            $parciales = DB::select('SELECT pp.id, a.nombre, pp.anno, pp.semestre, pp.dia, pp.turno, pp.semana
        FROM pruebasparciales as pp INNER JOIN asignaturas as a ON pp.asignaturas_id = a.id
        WHERE a.anno = ' . $anno . ' ');
            }

        return view('Modulo_Horario.parciales.index', compact('parciales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session()->put('anno', User::find(auth()->id())->anno);
        $anno = session()->get('anno');
        if(User::find(auth()->id())->hasRole('Vicedecana')){
        $asignaturas = Asignaturas::all();
        }else{
            $asignaturas = Asignaturas::all()->where('anno', session()->get('anno'));
        }
        return view('Modulo_Horario.parciales.create', compact('asignaturas', 'anno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // require('./app/generar_horario/update_horario.php');
        // $p = "hola";

        // $rules = [
        //     'asignaturas_id' => 'required|not_in:0',
        //     'anno' => 'required',
        //     'semestre' => 'required',
        //     'semana' => 'required',
        //     'dia' => 'required',
        //     'turno' => 'required',
        // ];
        // $messages = [
        //     'asignaturas_id.required' => 'Campo Requerido',
        //     'anno.required' => 'Campo Requerido',
        //     'semestre.required' => 'Campo Requerido',
        //     'semana.required' => 'Campo Requerido',
        //     'dia.required' => 'Campo Requerido',
        //     'turno.required' => 'Campo Requerido',
        // ];
        // $this->validate($request, $rules, $messages);

        // $asig = DB::select('SELECT * FROM asignaciones WHERE asignaciones.semana = ' . $request->get('semana') . '');
        // if ($asig) {
        //     return redirect()->route('parciales.index')->with('info', 'mostrar-generado');
        // } else {



        //     $grupos = Grupos::all()->where('anno', $request->get('anno'));

        //     foreach ($grupos as $g) {

        //         $p = new Planificacion();
        //         $p->profesores_id = NULL;
        //         $p->asignaturas_id = $request->get('asignaturas_id');
        //         $p->grupos_id = $g->id;

        //         //var_dump($p->profesores_id);
        //         $p->save();
        //     }


        //     $planificaciones = Planificacion::all()->where('profesores_id', NULL)->where('asignaturas_id', $request->get('asignaturas_id'));
        //     //var_dump($planificaciones);

        //     foreach ($planificaciones as $p) {


        //         $disp = DB::select('SELECT disponibilidad.id FROM disponibilidad WHERE disponibilidad.dia = ' . $request->get('dia') . ' AND disponibilidad.turno = ' . $request->get('turno') . '
        //         AND disponibilidad.locales_id IN (SELECT locales.id  FROM locales WHERE locales.tipo_de_locales_id = 1)');
        //         if (!$disp) {
        //             $disp = DB::select('SELECT disponibilidad.id FROM disponibilidad WHERE disponibilidad.dia = ' . $request->get('dia') . ' AND disponibilidad.turno = ' . $request->get('turno') . '
        //             AND disponibilidad.locales_id IN (SELECT locales.id  FROM locales WHERE locales.tipo_de_locales_id = 2)');
        //         }

        //         //var_dump($p->id);
        //         DB::insert(
        //             'insert into asignaciones (disponibilidad_id, planificacion_id, anno, semana, estado) values (?, ?, ?, ?, ?)',
        //             [1, 'Dayle']
        //         );
        //     }
        // }



        // $parciales = new Parciales();
        // $parciales->asignaturas_id = $request->get('asignaturas_id');
        // $parciales->semestre = $request->get('semestre');
        // $parciales->semana = $request->get('semana');
        // $parciales->anno = $request->get('anno');
        // $parciales->dia = $request->get('dia');
        // $parciales->turno = $request->get('turno');
        // // $asignaturas->semestre = $request->get('semestre');
        // $parciales->save();

        // return redirect()->route('parciales.index')->with('info', 'adicionar-parciales');
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
        $anno = session()->get('anno');
        $parciales = Parciales::find($id);
        $nombreasignaturas = Asignaturas::all()->where('anno', session()->get('anno'));

        
        return view('Modulo_Horario.parciales.edit', compact('parciales', 'nombreasignaturas', 'anno'));
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
        $parciales = Parciales::findOrFail($id);
        $rules = [
            'asignaturas_id' => 'required|not_in:0',
            'anno' => 'required',
            'semestre' => 'required',
            'semana' => 'required',
            'dia' => 'required',
            'turno' => 'required',
        ];
        $messages = [
            'asignaturas_id.required' => 'Campo Requerido',
            'anno.required' => 'Campo Requerido',
            'semana.required' => 'Campo Requerido',
            'semestre.required' => 'Campo Requerido',
            'dia.required' => 'Campo Requerido',
            'turno.required' => 'Campo Requerido',
        ];
        $this->validate($request, $rules, $messages);

        $parciales->asignaturas_id = $request->get('asignaturas_id');
        $parciales->semestre = $request->get('semestre');
        $parciales->semana = $request->get('semana');
        $parciales->anno = $request->get('anno');
        $parciales->dia = $request->get('dia');
        $parciales->turno = $request->get('turno');

        $parciales->update($request->all());

        return redirect()->route('parciales.index')->with('info', 'modificar-parciales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parcial = Parciales::findOrFail($id);

        // DB::delete('DELETE FROM asignaciones WHERE asignaciones.planificacion_id IN (SELECT planificacions.id FROM planificacions WHERE planificacions.asignaturas_id = ' . $parcial->asignaturas_id . '
        // AND planificacions.profesores_id IS NULL)');
        DB::delete('DELETE
        FROM planificacions
        WHERE planificacions.asignaturas_id = ' . $parcial->asignaturas_id . '
        AND planificacions.profesores_id IS NULL
        AND planificacions.id IN (SELECT asignaciones.planificacion_id
                                  FROM asignaciones
                                  WHERE asignaciones.semana = ' . $parcial->semana . '
                                  AND asignaciones.anno =' . $parcial->anno . '
                                  AND asignaciones.planificacion_id IN (SELECT planificacions.id
                                                                        FROM planificacions
                                                                        WHERE planificacions.asignaturas_id = ' . $parcial->asignaturas_id . '
                                                                        AND planificacions.profesores_id IS NULL))');

        $parcial->delete();
        return redirect()->route('parciales.index')->with('info', 'eliminar-parciales');
    }
}