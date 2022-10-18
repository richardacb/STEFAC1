<?php

namespace App\Http\Controllers\Modulo_Horario;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_Horario\Balancedecarga;
use App\Models\Modulo_Horario\Asignaturas;
use App\Models\User;
use App\Exports\BalancedecargaExport;

class BalancedecargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_Horario.balancedecarga.index')->only('index');
        $this->middleware('can:Modulo_Horario.balancedecarga.create')->only('create', 'store');
        $this->middleware('can:Modulo_Horario.balancedecarga.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_Horario.balancedecarga.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        session()->put('anno', User::find(auth()->id())->anno);

        $balancedecarga['balancedecarga']=Balancedecarga::all();
        $nombreasignaturas['nombreasignaturas']=Asignaturas::all()->where('anno',session()->get('anno'));

        return view('Modulo_Horario.balancedecarga.index',$balancedecarga,$nombreasignaturas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $nombreasignaturas['nombreasignaturas'] = Asignaturas::all()->where('anno',session()->get('anno'));
        return view('Modulo_Horario.balancedecarga.create',$nombreasignaturas);
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
            'frecuencia' => 'required',
            'tipo_clase' => 'required',
            'semana' => 'required',

             ];
             $messages = [
                'asignaturas_id.required' =>'Campo Requerido',
                'frecuencia.required' =>'Campo Requerido',
                'tipo_clase.required' =>'Campo Requerido',
                'semana.required' =>'Campo Requerido',

             ];
             $this->validate( $request, $rules, $messages);

        $balancedecarga=new Balancedecarga();
        $balancedecarga->asignaturas_id = $request->get('asignaturas_id');
        $balancedecarga->frecuencia = $request->get('frecuencia');
        $balancedecarga->tipo_clase = $request->get('tipo_clase');
        $balancedecarga->semana = $request->get('semana');

        $balancedecarga->save();

        return redirect()->route('balancedecarga.index', $balancedecarga)->with('info', 'adicionar-balancedecarga');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Balancedecarga $balancedecarga)
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
        $balancedecarga = Balancedecarga::find($id);
        $nombreasignaturas=Asignaturas::all();
        return view('Modulo_Horario.balancedecarga.edit', compact('balancedecarga','nombreasignaturas'));
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
        $balancedecarga = Balancedecarga::findOrFail($id);
        $rules = [
            'asignaturas_id' => 'required|not_in:0',
            'frecuencias' => 'required',
            'tipo_clase' => 'required',
            'semana' => 'required',

             ];
             $messages = [
                'asignaturas_id.required' =>'Campo Requerido',
                'frecuencias.required' =>'Campo Requerido',
                'tipo_clase.required' =>'Campo Requerido',
                'semana.required' =>'Campo Requerido',

             ];
             $this->validate( $request, $rules, $messages);


        $balancedecarga->asignaturas_id = $request->get('asignaturas_id');
        $balancedecarga->frecuencia = $request->get('frecuencias');
        $balancedecarga->tipo_clase = $request->get('tipo_clase');
        $balancedecarga->semana = $request->get('semana');

        $balancedecarga->update($request->all());

        return redirect()->route('balancedecarga.index', compact('balancedecarga'))->with('info', 'modificar-balancedecarga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balancedecarga $balancedecarga)
    {
        $balancedecarga->delete();
        return redirect()->route('balancedecarga.index')->with('info', 'eliminar-balancedecarga');
    }
    public function exportExcel(){
        return Excel::download(new BalancedecargaExport, 'Balance de Carga.xlsx');
    }

}