<?php

namespace App\Http\Controllers\Modulo_PerfildeUsuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_PerfildeUsuario\Grupos;
use App\Models\User;
use App\Imports\GruposImport;
use App\Models\Modulo_Horario\Grupo;
use Maatwebsite\Excel\Facades\Excel;

class GruposController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_PerfildeUsuario.grupos.index')->only('index');
        $this->middleware('can:Modulo_PerfildeUsuario.grupos.create')->only('create', 'store');
        $this->middleware('can:Modulo_PerfildeUsuario.grupos.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_PerfildeUsuario.grupos.destroy')->only('destroy');
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
        $grupos = Grupos::all();
        }else{
            $grupos = Grupos::all()->where('anno', session()->get('anno')); 
        }

        return view('Modulo_PerfildeUsuario.grupos.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(User::find(auth()->id())->hasRole('Vicedecana')){
        $annosgrupos = session()->get('anno');
        $grupos = Grupos::all()->where('anno', session()->get('anno'));
        }else{
        $annosgrupos = session()->get('anno');
        $grupos = Grupos::all()->where('anno', session()->get('anno'));
        }
        return view('Modulo_PerfildeUsuario.grupos.create', compact('annosgrupos','grupos'));
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
            'name' => 'required|unique:grupos',
            'anno' => 'required',
         ];
         $messages = [
            'name.required' =>'Campo Requerido',
            'name.unique' => 'Campo Único',
            'anno.required' =>'Campo Requerido',
         ];
         $this->validate( $request,$rules, $messages);

        $grupo = new Grupo;
        $grupo->name = "IDF1" . $request->get('anno') . "0" . $request->get('name');
        $grupo->anno = $request->get('anno');
        //$grupos = Grupos::create($request->all());
        //var_dump($grupo->name);
        //$anno = session()->get('anno');
        $grupo->save();
        return redirect()->route('grupos.index')->with('info', 'adicionar-grupo', 'anno');
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
        $annosgrupos = session()->get('anno');
        $grupos = Grupos::findOrFail($id);
        $numero =  substr($grupos->name, - 1);
        $grupos->name = $numero;

        return view('Modulo_PerfildeUsuario.grupos.edit', compact('grupos', 'annosgrupos'));
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
        $grupos = Grupos::findOrFail($id);

        $rules = [
            'name' => "required|unique:grupos,name,$grupos->id",
            'anno' => 'required',
        ];
        $messages = [
            'name.required' => 'Campo Requerido',
            'name.unique' => 'Campo Único',
            'anno.required' =>'Campo Requerido',
        ];
        $this->validate($request, $rules, $messages);

        $grupos->name = "IDF1" . $request->get('anno') . "0" . $request->get('name');
        $grupos->anno = $request->get('anno');

        $grupos->save();
        var_dump($grupos->name);

       return redirect()->route('grupos.index')->with('info', 'modificar-grupo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupos = Grupos::findOrFail($id);

        $grupos->delete();

        return redirect()->route('grupos.index')->with('info', 'eliminar-grupo');
    }
   
}