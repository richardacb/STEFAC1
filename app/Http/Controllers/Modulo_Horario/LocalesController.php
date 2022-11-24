<?php

namespace App\Http\Controllers\Modulo_Horario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_Horario\Locales;
use App\Models\Modulo_Horario\Tipo_de_locales;
use Illuminate\Support\Facades\DB;

class LocalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_Horario.locales.index')->only('index');
        $this->middleware('can:Modulo_Horario.locales.create')->only('create', 'store');
        $this->middleware('can:Modulo_Horario.locales.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_Horario.locales.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$locales = Locales::all();


        $locales = DB::select('SELECT ls.id, tl.tipo, ls.local, ls.disponibilidad
        FROM locales as ls INNER JOIN tipo_de_locales as tl ON ls.tipo_de_locales_id = tl.id
         ');

        return view('Modulo_Horario.locales.index', compact('locales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_de_locales=Tipo_de_locales::all();
        return view('Modulo_Horario.locales.create', compact('tipo_de_locales'));
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
            'local' => 'required',
            'tipo_de_locales' => 'required|not_in:0',
            'disponibilidad' => 'required',
             ];
             $messages = [
                'local.required' =>'Campo Requerido',
                'tipo_de_locales.required' =>'Campo Requerido',
                'disponibilidad.required' =>'Campo Requerido',
             ];
             $this->validate( $request, $rules, $messages);

        $locales=new Locales();
        $locales->tipo_de_locales_id = $request->get('tipo_de_locales');
        $locales->local = $request->get('local');
        $locales->disponibilidad = $request->get('disponibilidad');

        $locales->save();
        //$asignaturas=Asignaturas::create($request->all());

        return redirect()->route('locales.index')->with('info', 'adicionar-local');
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
        $l = Locales::find($id);
        $tipo_de_locales=Tipo_de_locales::all();
        return view('Modulo_Horario.locales.edit', compact('l','tipo_de_locales'));
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
            'local' => 'required',
            'tipo_de_locales' => 'required|not_in:0',
            'disponibilidad' => 'required',
             ];
             $messages = [
                'local.required' =>'Campo Requerido',
                'tipo_de_locales.required' =>'Campo Requerido',
                'disponibilidad.required' =>'Campo Requerido',
             ];
             $this->validate( $request, $rules, $messages);

        $l = Locales::find($id);
        $l->tipo_de_locales_id = $request->get('tipo_de_locales');
        $l->local = $request->get('local');
        $l->disponibilidad = $request->get('disponibilidad');

        $l->update($request->all());

        return redirect()->route('locales.index')->with('info', 'modificar-local');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locales=Locales::findOrFail($id);
        $locales->delete();
        return redirect()->route('locales.index')->with('info', 'eliminar-local');
    }
}