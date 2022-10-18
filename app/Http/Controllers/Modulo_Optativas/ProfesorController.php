<?php

namespace App\Http\Controllers\Modulo_Optativas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_PerfildeUsuario\Profesores;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesores::all();
        return view('profesor.index')->with('profesores',$profesores);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Modulo_Optativas.profesor.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profesores = new Profesores();
        $profesores->nombre = $request->get('nombre');
        $profesores->apellido = $request->get('apellido');
        $profesores->categoria_docente = $request->get('categoria_docente');
        $profesores->categoria_cientifica = $request->get('categoria_cientifica');
        $profesores->cargo = $request->get('cargo');

        $profesores->save();
        return redirect('/profesores');
        //
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
        $profesor = Profesores::find($id);

        return view('Modulo_Optativas.profesor.edit')->with('profesor', $profesor);
        //
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
        $profesor = Profesores::find($id);

        $profesor->nombre = $request->get('nombre');
        $profesor->apellido = $request->get('apellido');
        $profesor->categoria_docente = $request->get('categoria_docente');
        $profesor->categoria_cientifica = $request->get('categoria_cientifica');
        $profesor->cargo = $request->get('cargo');

        $profesor->save();

        return redirect('/profesores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor = Profesores::find($id);
        $profesor->delete();
        return redirect('/profesores');
        //
    }
}