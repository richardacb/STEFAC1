<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\Comite;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Modulo_PerfildeUsuario\Estudiantes;
use App\Models\Modulo_PerfildeUsuario\Profesores;


class ComiteController extends Controller
{
    
    public function index()
    {
        $comites = Comite::paginate();

        
        return view('Modulo_GECE.comite.index', compact('comites'))
            ->with('i', (request()->input('page', 1) - 1) * $comites->perPage());
    }

    
    public function create()
    {
        $comite = new Comite();
        
        $estudiantes = User::pluck('primer_nombre', 'id');
        $estudiante2 = User::pluck('primer_nombre', 'id');
        $profesores = User::pluck('primer_nombre', 'id');
        $secretario = User::pluck('primer_nombre', 'id');
        $presidente = User::pluck('primer_nombre', 'id');
        return view('Modulo_GECE.comite.create', compact('comite', 'estudiantes', 'estudiante2', 'profesores', 'secretario', 'presidente'));
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
        // $comite = Comite::find($id);
        $comite = DB::select('SELECT c.id, c.nombre, e1.est1, e2.est2, p.prof, s.sec, pte.pre
        FROM comites as c 
        INNER JOIN 
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as est1
        FROM users as u) as e1 ON e1.id = c.estudiante_id
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as est2
        FROM users as u) as e2 ON e2.id = c.estudiante2
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as prof
        FROM users as u) as p ON p.id = c.profesor_id
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as sec
        FROM users as u) as s ON s.id = c.secretario
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as pre
        FROM users as u) as pte ON pte.id = c.presidente
        ')[0];
        
        // var_dump($comite->est1);
        return view('Modulo_GECE.comite.show', compact('comite'));
    }

    public function edit($id)
    {
        $comite = Comite::find($id);

        $estudiantes = User::pluck('primer_nombre', 'id');
        $estudiante2 = User::pluck('primer_nombre', 'id');
        $profesores = User::pluck('primer_nombre', 'id');
        $secretario = User::pluck('primer_nombre', 'id');
        $presidente = User::pluck('primer_nombre', 'id');
        return view('Modulo_GECE.comite.edit', compact('comite', 'estudiantes', 'estudiante2', 'profesores', 'secretario', 'presidente'));
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
