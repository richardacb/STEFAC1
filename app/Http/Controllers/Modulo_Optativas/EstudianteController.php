<?php

namespace App\Http\Controllers\Modulo_Optativas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_PerfildeUsuario\Estudiantes;

class EstudianteController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiantes::all();
        return view('Modulo_Optativas.estudiante.index')->with('estudiantes',$estudiantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Modulo_Optativas.estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudiantes = new Estudiantes();

        $estudiantes->nombre = $request->get('nombre');
        $estudiantes->anno = $request->get('anno');
        $estudiantes->grupo = $request->get('grupo');

        $estudiantes->save();

        return redirect('/estudiantes');
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
        $estudiante = Estudiantes::find($id);

        return view('Modulo_Optativas.estudiante.edit')->with('estudiante', $estudiante);
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
        $estudiante = Estudiantes::find($id);

        $estudiante->nombre = $request->get('nombre');
        $estudiante->anno = $request->get('anno');
        $estudiante->grupo = $request->get('grupo');

        $estudiante->save();

        return redirect('/estudiantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiantes::find($id);

        $estudiante->delete();

        return redirect('/estudiantes');
    }
}