<?php

namespace App\Http\Controllers\Modulo_GECE;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\Perfil;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Modulo_PerfildeUsuario\Estudiantes;
use App\Models\Modulo_PerfildeUsuario\Profesores;

class PerfilController extends Controller
{
    public function index()
    {
        $perfil = Perfil::paginate();

        return view('Modulo_GECE.perfil.index', compact('perfil'))
            ->with('i', (request()->input('page', 1) - 1) * $perfil->perPage());
    }

    public function create()
    {
        $perfil = new Perfil();
        $estudiante1 = User::pluck('primer_nombre', 'id'); 
        $estudiante2 = User::pluck('primer_nombre', 'id');
        $profesor1 = User::pluck('primer_nombre', 'id');
        $profesor2 = User::pluck('primer_nombre', 'id');
        return view('Modulo_GECE.perfil.create', compact('perfil', 'estudiante1', 'estudiante2', 'profesor1', 'profesor2'));
    }

    
    public function store(Request $request)
    {
        //
        request()->validate(Perfil::$rules);

        $perfil = Perfil::create($request->all());

        return redirect()->route('perfil.index')
            ->with('success', 'Perfil creado satisfactoriamente!.');
    }

    
    public function show($id)
    {
        //$perfil = Perfil::find($id);
        $perfil = DB::select('SELECT pf.id, pf.nombre, e1.est1, e2.est2, p1.prof1, p2.prof2
        FROM perfil as pf
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as est1
        FROM users as u) as e1 ON e1.id = pf.estudiante1
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as est2
        FROM users as u) as e2 ON e2.id = pf.estudiante2
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as prof1
        FROM users as u) as p1 ON p1.id = pf.profesor1
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as prof2
        FROM users as u) as p2 ON p2.id = pf.profesor2
        ')[0];

        return view('Modulo_GECE.perfil.show', compact('perfil'));
    }

   
    public function edit($id)
    {
        //
        $perfil = Perfil::find($id);
        $estudiante1 = User::pluck('primer_nombre', 'id'); 
        $estudiante2 = User::pluck('primer_nombre', 'id');
        $profesor1 = User::pluck('primer_nombre', 'id');
        $profesor2 = User::pluck('primer_nombre', 'id');
        return view('Modulo_GECE.perfil.edit', compact('perfil', 'estudiante1', 'estudiante2', 'profesor1', 'profesor2'));
    }

    
    public function update(Request $request, Perfil $perfil)
    {
        //
        request()->validate(Perfil::$rules);

        $perfil->update($request->all());

        return redirect()->route('perfil.index')
            ->with('success', 'Perfil modificado satisfactoriamente!.');
    }

    
    public function destroy($id)
    {
        //
        $perfil = Perfil::find($id)->delete();

        return redirect()->route('perfil.index')
            ->with('success', 'Perfil eliminado satisfactoriamente!.');
    }
}
