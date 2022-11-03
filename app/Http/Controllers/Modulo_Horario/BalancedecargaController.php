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
use Barryvdh\DomPDF\Facade\PDF;

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
    public function exportExcel()
    {
        return Excel::download(new BalancedecargaExport, 'Balance de Carga.xlsx');
    }
    public function createPDF()
    {
        //Recuperar todos los productos de la db
        session()->put('anno', User::find(auth()->id())->anno);
        $anno = session()->get('anno');

        $balancedecarga = Balancedecarga::join('asignaturas', 'asignaturas.id', '=', 'balance_de_carga.asignaturas_id')
            ->select('asignaturas.nombre', 'balance_de_carga.semana', 'balance_de_carga.frecuencia', 'balance_de_carga.tipo_clase')
            ->where('asignaturas.anno', '=', $anno)->get();

        view()->share(
            'Modulo_Horario.balancedecarga.indexpdf',
            compact('balancedecarga')
        );
        $pdf = PDF::loadView('Modulo_Horario.balancedecarga.indexpdf',  compact('balancedecarga'));
        return $pdf->download('archivo-pdf.pdf');
    }
    public function index()
    {

        session()->put('anno', User::find(auth()->id())->anno);
        $anno = session()->get('anno');
        if(User::find(auth()->id())->hasRole('Vicedecana')){
        $balancedecarga = DB::select('SELECT bc.id, a.nombre, bc.frecuencia, bc.tipo_clase, bc.semana
        FROM balance_de_carga as bc INNER JOIN asignaturas as a ON bc.asignaturas_id = a.id
         ');
        }else{
            $balancedecarga = DB::select('SELECT bc.id, a.nombre, bc.frecuencia, bc.tipo_clase, bc.semana
        FROM balance_de_carga as bc INNER JOIN asignaturas as a ON bc.asignaturas_id = a.id
        WHERE a.anno = ' . $anno . ' ');
        }

        // $balancedecarga['balancedecarga']= Balancedecarga::all()->where('anno',session()->get('anno'));
        //var_dump($balancedecarga);
        //$nombreasignaturas = DB::select('SELECT a.id, a.nombre FROM asignaturas as a WHERE a.anno = ' . $anno . ' ');

        //Asignaturas::all()->where('anno', session()->get('anno'));
        //var_dump($nombreasignaturas);
        return view('Modulo_Horario.balancedecarga.index',)
            ->with('balancedecarga', $balancedecarga);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(User::find(auth()->id())->hasRole('Vicedecana')){
        $nombreasignaturas['nombreasignaturas'] = Asignaturas::all()->where('estado', 1);
        }else{
        $nombreasignaturas['nombreasignaturas'] = Asignaturas::all()->where('anno', session()->get('anno'))->where('estado', 1);
        }
        return view('Modulo_Horario.balancedecarga.create', $nombreasignaturas);
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
            'tipo_clase' => 'required',
            'semana' => 'required',

        ];
        $messages = [
            'asignaturas_id.required' => 'Campo Requerido',
            'tipo_clase.required' => 'Campo Requerido',
            'semana.required' => 'Campo Requerido',

        ];
        $this->validate($request, $rules, $messages);

        $value = explode(',', $request->get('tipo_clase'));

        $balancedecarga = new Balancedecarga();
        $balancedecarga->asignaturas_id = $request->get('asignaturas_id');
        $balancedecarga->frecuencia = sizeof($value);
        $balancedecarga->tipo_clase = $request->get('tipo_clase');
        $balancedecarga->semana = $request->get('semana');

        $balancedecarga->save();

        return redirect()->route('balancedecarga.index')->with('info', 'adicionar-balancedecarga');
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

        session()->put('anno', User::find(auth()->id())->anno);
        $anno  = session()->get('anno');

        $select_anno = DB::select('SELECT a.anno
        FROM balance_de_carga as bc INNER JOIN asignaturas as a ON bc.asignaturas_id = a.id
        WHERE bc.id = ' . $id . '');

        if ($anno === $select_anno[0]->anno || (User::find(auth()->id())->hasRole('Vicedecana'))) {
            $balancedecarga = Balancedecarga::find($id);

            $nombreasignaturas = Asignaturas::all()->where('anno', session()->get('anno'));

            if(User::find(auth()->id())->hasRole('Vicedecana')){
                $nombreasignaturas = Asignaturas::all();
                }else{
                $nombreasignaturas = Asignaturas::all()->where('anno', session()->get('anno'));
                }
        } else {
            abort(401);
        }
        return view('Modulo_Horario.balancedecarga.edit', compact('balancedecarga', 'nombreasignaturas'));

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
            'tipo_clase' => 'required',
            'semana' => 'required',

        ];
        $messages = [
            'asignaturas_id.required' => 'Campo Requerido',
            'tipo_clase.required' => 'Campo Requerido',
            'semana.required' => 'Campo Requerido',

        ];
        $this->validate($request, $rules, $messages);


        $value = explode(',', $request->get('tipo_clase'));

        $balancedecarga->asignaturas_id = $request->get('asignaturas_id');
        $balancedecarga->frecuencia =  sizeof($value);
        $balancedecarga->tipo_clase = $request->get('tipo_clase');
        $balancedecarga->semana = $request->get('semana');

        $balancedecarga->update($request->all());

        return redirect()->route('balancedecarga.index')->with('info', 'modificar-balancedecarga');
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
}