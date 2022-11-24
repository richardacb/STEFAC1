<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\TribunalTaller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Modulo_PerfildeUsuario\Estudiantes;
use App\Models\Modulo_PerfildeUsuario\Profesores;


class TribunalTallerController extends Controller
{
    
    public function index()
    {
        //
        $tribunaltaller = TribunalTaller::paginate();

        return view('Modulo_GECE.tribunaltaller.index', compact('tribunaltaller'))
            ->with('i', (request()->input('page', 1) - 1) * $tribunaltaller->perPage());
    }

    
    public function create()
    {
        //
        $tribunaltaller = new TribunalTaller();
        $estudiante1 = User::pluck('primer_nombre', 'id'); 
        $estudiante2 = User::pluck('primer_nombre', 'id');
        $profesor1 = User::pluck('primer_nombre', 'id');
        $profesor2 = User::pluck('primer_nombre', 'id');
        $secretario = User::pluck('primer_nombre', 'id');
        $presidente = User::pluck('primer_nombre', 'id');
        $miembro = User::pluck('primer_nombre', 'id');      
        return view('Modulo_GECE.tribunaltaller.create', compact('tribunaltaller', 'estudiante1', 'estudiante2', 'profesor1', 'profesor2', 'secretario', 'presidente', 'miembro'));
    }

    public function store(Request $request)
    {
        //
        request()->validate(TribunalTaller::$rules);

        $tribunaltaller = TribunalTaller::create($request->all());

        return redirect()->route('tribunaltaller.index')
            ->with('success', 'Tribunal Taller creado satisfactoriamente!.');
    }

    
    public function show($id)
    {
        
        // $tribunaltaller = TribunalTaller::find($id);

        $tribunaltaller = DB::select('SELECT t.id, t.nombre, e1.est1, e2.est2, p1.prof1, p2.prof2, s.sec, pte.pre, m.miem
        FROM tribunal_tallers as t
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
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as sec
        FROM users as u) as s ON s.id = t.secretario
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as pre
        FROM users as u) as pte ON pte.id = t.presidente
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as miem
        FROM users as u) as m ON m.id = t.miembro
        ')[0];

        return view('Modulo_GECE.tribunaltaller.show', compact('tribunaltaller'));
    }

    
    public function edit($id)
    {
        //
        $tribunaltaller = TribunalTaller::find($id);
        $estudiante1 = User::pluck('primer_nombre', 'id'); 
        $estudiante2 = User::pluck('primer_nombre', 'id');
        $profesor1 = User::pluck('primer_nombre', 'id');
        $profesor2 = User::pluck('primer_nombre', 'id');
        $secretario = User::pluck('primer_nombre', 'id');
        $presidente = User::pluck('primer_nombre', 'id');
        $miembro = User::pluck('primer_nombre', 'id'); 
        return view('Modulo_GECE.tribunaltaller.edit', compact('tribunaltaller', 'estudiante1', 'estudiante2', 'profesor1', 'profesor2', 'secretario', 'presidente', 'miembro'));
    }

   
    public function update(Request $request, TribunalTaller $tribunaltaller)
    {
        //
        request()->validate(TribunalTaller::$rules);

        $tribunaltaller->update($request->all());

        return redirect()->route('tribunaltaller.index')
            ->with('success', 'Tribunal Taller modificado satisfactoriamente!');
    }

    
    public function destroy($id)
    {
        //
        $tribunaltaller = TribunalTaller::find($id)->delete();

        return redirect()->route('tribunaltaller.index')
            ->with('success', 'Tribunal Taller eliminado satisfactoriamente!');
    }
}

