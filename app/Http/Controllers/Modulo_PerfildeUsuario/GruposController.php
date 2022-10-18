<?php

namespace App\Http\Controllers\Modulo_PerfildeUsuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_PerfildeUsuario\Grupos;
use App\Models\User;
use App\Imports\GruposImport;
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
        $grupos = Grupos::all()->where('anno', session()->get('anno'));

        return view('Modulo_PerfildeUsuario.grupos.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $annosgrupos = session()->get('anno');
        return view('Modulo_PerfildeUsuario.grupos.create', compact('annosgrupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  $rules = [
        //     'name' => 'required|unique:grupos',
        //  ];
        //  $messages = [
        //     'name.required' =>'Campo Requerido',
        //     'name.unique' => 'Campo Único',
        //  ];
        //  $this->validate( $request,$rules, $messages);

        $grupos = Grupos::create($request->all());

        $anno = session()->get('anno');

        return redirect()->route('grupos.index', compact('grupos'))->with('info', 'adicionar-grupo', 'anno');
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
        $grupos = Grupos::findOrFail($id);
        return view('Modulo_PerfildeUsuario.grupos.edit', compact('grupos'));
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
        ];
        $messages = [
            'name.required' => 'Campo Requerido',
            'name.unique' => 'Campo Único',
        ];
        $this->validate($request, $rules, $messages);

        $grupos->update($request->all());

        return redirect()->route('grupos.index', compact('grupos'))->with('info', 'modificar-grupo');
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
    // public function importar_grupos(Request $request)
    // {

    //     $file = $request->file('import_file');

    //     Excel::import(new GruposImport, $file);

    //     return redirect()->route('grupos.index')->with('info', 'importar-grupo');
    // }
}