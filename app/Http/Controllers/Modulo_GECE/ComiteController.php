<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\Comite;
use App\Models\User;
use App\Models\Modulo_PerfildeUsuario\Estudiantes;
use App\Models\Modulo_PerfildeUsuario\Profesores;


class ComiteController extends Controller
{
    
    public function index()
    {
        $comites = Comite::paginate();
        $users = User::all();
        $usuarios = User::all();
        return view('Modulo_GECE.comite.index', compact('comites', 'users', 'usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $comites->perPage());
    }

    
    public function create()
    {
        $comite = new Comite();
        
        $estudiantes = User::pluck('primer_nombre','id');
        $profesores = User::pluck('primer_nombre','id');
        return view('Modulo_GECE.comite.create', compact('comite', 'estudiantes', 'profesores'));
    }

    
    public function store(Request $request)
    {
        request()->validate(Comite::$rules);

        $comite = Comite::create($request->all());

        return redirect()->route('comite.index')
            ->with('success', 'Comité creado satisfactoriamente!.');
    }

    
    public function show($id)
    {
        $comite = Comite::find($id);

        return view('Modulo_GECE.comite.show', compact('comite'));
    }

    public function edit($id)
    {
        $comite = Comite::find($id);
        $estudiantes = User::pluck('primer_nombre','id');
        $profesores = User::pluck('primer_nombre','id');
        return view('Modulo_GECE.comite.edit', compact('comite', 'estudiantes', 'profesores'));
    }

    
    public function update(Request $request, Comite $comite)
    {
        request()->validate(Comite::$rules);

        $comite->update($request->all());

        return redirect()->route('comite.index')
            ->with('success', 'Comité modificado satisfactoriamente!');
    }

    
    public function destroy($id)
    {
        //
        $comite = Comite::find($id)->delete();

        return redirect()->route('comite.index')
            ->with('success', 'Comité eliminado satisfactoriamente!.');
    }
}
