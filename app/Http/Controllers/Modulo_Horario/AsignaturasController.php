<?php

namespace App\Http\Controllers\Modulo_Horario;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_Horario\Asignaturas;
use App\Models\User;
use App\Models\Modulo_Horario\Secciones;

class AsignaturasController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_Horario.asignaturas.index')->only('index');
        $this->middleware('can:Modulo_Horario.asignaturas.create')->only('create', 'store');
        $this->middleware('can:Modulo_Horario.asignaturas.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_Horario.asignaturas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        session()->put('anno', User::find(auth()->id())->anno);

        if(User::find(auth()->id())->hasRole('Vicedecana')){
        $asignaturas=Asignaturas::all();
        }else{
        $asignaturas=Asignaturas::all()->where('anno',session()->get('anno'));
        }
        $secciones = Secciones::all();
        return view('Modulo_Horario.asignaturas.index', compact('asignaturas', 'secciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secciones = Secciones::all();
        $anno = session()->get('anno');
        return view('Modulo_Horario.asignaturas.create', compact('secciones', 'anno'));
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
            'seccion' => 'required|not_in:0',
            'nombre' => 'required|unique:asignaturas,nombre',
            'anno' => 'required',
            'semestre' => 'required',
            'estado' => 'required'
        ];
        $messages = [
            'seccion.required' => 'Campo Requerido',
            'nombre.required' => 'Campo Requerido',
            'anno.required' => 'Campo Requerido',
            'semestre.required' => 'Campo Requerido',
            'estado.required' => 'Campo Requerido',
        ];
        $this->validate($request, $rules, $messages);

        $asignaturas = new Asignaturas();
        $asignaturas->secciones_id = $request->get('seccion');
        $asignaturas->nombre = $request->get('nombre');
        $asignaturas->anno = $request->get('anno');
        $asignaturas->semestre = $request->get('semestre');
        $asignaturas->estado = $request->get('estado');
        $asignaturas->save();

        return redirect()->route('asignaturas.index')->with('info', 'adicionar-asignatura');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Asignaturas $asignaturas)
    {

        return view('Modulo_Horario.asignaturas.show', compact('asignaturas'));
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
        $asignatura = Asignaturas::find($id);
        if ($anno === $asignatura->anno || (User::find(auth()->id())->hasRole('Vicedecana'))) {
            $secciones = Secciones::all();
            $seccion = DB::select('SELECT asignaturas.*
        FROM asignaturas
        WHERE asignaturas.secciones_id NOT IN (SELECT secciones.id
                                    FROM secciones
                                    WHERE secciones.id <> ' . $asignatura->secciones_id . '
                                  )
');
            return view('Modulo_Horario.asignaturas.edit', compact('asignatura', 'secciones', 'seccion'));
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
        session()->put('anno', User::find(auth()->id())->anno);
        $anno = session()->get('anno');
        $asignatura_anno = DB::select('SELECT asignaturas.anno
        FROM asignaturas
        WHERE asignaturas.anno = ' . $anno . '');

        if ($request->user()
            ->can('update', $id)

        ) {
            abort(403);
        }

        $asignatura = Asignaturas::find($id);
        /*  $request->validate([
            'name_5' => 'required',
            'frecuencias' => 'required',
        ]);

        $asignaturas5 = update($request->all());
        return redirect()->route('asignaturas5.index', $asignaturas5)->with('info', 'Asignatura Modificada');*/

        $rules = [
            'seccion' => 'required|not_in:0',
            'nombre' => 'required',
            'anno' => 'required',
            'semestre' => 'required',
            'estado' => 'required'
        ];
        $messages = [
            'seccion.required' => 'Campo Requerido',
            'nombre.required' => 'Campo Requerido',
            'anno.required' => 'Campo Requerido',
            'semestre.required' => 'Campo Requerido',
            'estado.required' => 'Campo Requerido',
        ];
        $this->validate($request, $rules, $messages);

        $asignatura->secciones_id = $request->get('seccion');
        $asignatura->nombre = $request->get('nombre');
        $asignatura->anno = $request->get('anno');
        $asignatura->semestre = $request->get('semestre');
        $asignatura->estado = $request->get('estado');
        $asignatura->update($request->all());

        return redirect()->route('asignaturas.index')->with('info', 'modificar-asignatura');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignaturas $asignatura)
    {

        $asignatura->delete();

        return redirect()->route('asignaturas.index')->with('info', 'eliminar-asignatura');
    }
}