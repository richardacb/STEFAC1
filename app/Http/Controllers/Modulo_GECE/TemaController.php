<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\Tema;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Modulo_PerfildeUsuario\Estudiantes;
use App\Models\Modulo_PerfildeUsuario\Profesores;


class TemaController extends Controller
{
    
    public function index()
    {
        //
        $tema = Tema::paginate();

        return view('Modulo_GECE.temas.index', compact('tema'))
            ->with('i', (request()->input('page', 1) - 1) * $tema->perPage());
    }

    
    public function create()
    {
        
        $tema = new Tema();
        $estudiante1 = User::pluck('primer_nombre', 'id'); 
        $estudiante2 = User::pluck('primer_nombre', 'id');
        $profesor1 = User::pluck('primer_nombre', 'id');
        $profesor2 = User::pluck('primer_nombre', 'id');
        
        return view('Modulo_GECE.temas.create', compact('tema', 'estudiante1', 'estudiante2', 'profesor1', 'profesor2'));
    }

    public function store(Request $request)
    {
        //
        request()->validate(Tema::$rules);

        $tema = Tema::create($request->all());

        return redirect()->route('temas.index')
            ->with('success', 'tema creado satisfactoriamente!.');
    }

    
    public function show($id)
    {
        //$tema = Tema::find($id);
        
        $tema = DB::select('SELECT t.id, t.nombre, e1.est1, e2.est2, p1.prof1, p2.prof2
        FROM temas as t
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as est1
        FROM users as u) as e1 ON e1.id = t.estudiante1
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as est2
        FROM users as u) as e2 ON e2.id = t.estudiante2
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as prof1
        FROM users as u) as p1 ON p1.id = t.profesor1
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as prof2
        FROM users as u) as p2 ON p2.id = t.profesor2
        ')[0];

        return view('Modulo_GECE.temas.show', compact('tema'));
    }

    
    public function edit($id)
    {
        //
        $tema = Tema::find($id);
        $estudiante1 = User::pluck('primer_nombre', 'id'); 
        $estudiante2 = User::pluck('primer_nombre', 'id');
        $profesor1 = User::pluck('primer_nombre', 'id');
        $profesor2 = User::pluck('primer_nombre', 'id');
        return view('Modulo_GECE.temas.edit', compact('tema', 'estudiante1', 'estudiante2', 'profesor1', 'profesor2'));
    }

   
    public function update(Request $request, Tema $tema)
    {
        //
        request()->validate(Tema::$rules);

        $tema->update($request->all());

        return redirect()->route('temas.index')
            ->with('success', 'tema modificado satisfactoriamente!');
    }

    
    public function destroy($id)
    {
        //
        $tema = Tema::find($id)->delete();

        return redirect()->route('temas.index')
            ->with('success', 'tema borrado satisfactoriamente!');
    }
}
