<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\TribunalPD;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Modulo_PerfildeUsuario\Estudiantes;
use App\Models\Modulo_PerfildeUsuario\Profesores;

class TribunalPDController extends Controller
{
    
    public function index()
    {
        //
        $tribunalpd = TribunalPD::paginate();

        return view('Modulo_GECE.tribunalpd.index', compact('tribunalpd'))
            ->with('i', (request()->input('page', 1) - 1) * $tribunalpd->perPage());
    }

    
    public function create()
    {
        //
        $tribunalpd = new TribunalPD();
        $estudiante1 = User::pluck('primer_nombre', 'id'); 
        $estudiante2 = User::pluck('primer_nombre', 'id');
        $profesor1 = User::pluck('primer_nombre', 'id');
        $profesor2 = User::pluck('primer_nombre', 'id');
        $secretario = User::pluck('primer_nombre', 'id');
        $presidente = User::pluck('primer_nombre', 'id');
        $miembro = User::pluck('primer_nombre', 'id');
        $oponente = User::pluck('primer_nombre', 'id'); 
        return view('Modulo_GECE.tribunalpd.create', compact('tribunalpd', 'estudiante1', 'estudiante2', 'profesor1', 'profesor2', 'secretario', 'presidente', 'miembro', 'oponente'));
    }

    public function store(Request $request)
    {
        //
        request()->validate(TribunalPD::$rules);

        $tribunalpd = TribunalPD::create($request->all());

        return redirect()->route('tribunalpd.index')
            ->with('success', 'Tribunal de Predefensa y Defensa creado satisfactoriamente!.');
    }

    
    public function show($id)
    {
        //$tribunalpd = TribunalPD::find($id);
        $tribunalpd = DB::select('SELECT tpd.id, tpd.nombre, e1.est1, e2.est2, p1.prof1, p2.prof2, s.sec, pte.pre, m.miem, o.op
        FROM tribunalpds as tpd
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as est1
        FROM users as u) as e1 ON e1.id = tpd.estudiante1
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as est2
        FROM users as u) as e2 ON e2.id = tpd.estudiante2
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as prof1
        FROM users as u) as p1 ON p1.id = tpd.profesor1
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as prof2
        FROM users as u) as p2 ON p2.id = tpd.profesor2
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as sec
        FROM users as u) as s ON s.id = tpd.secretario
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as pre
        FROM users as u) as pte ON pte.id = tpd.presidente
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as miem
        FROM users as u) as m ON m.id = tpd.miembro
        INNER JOIN
        (SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as op
        FROM users as u) as o ON o.id = tpd.oponente
        ')[0];

        return view('Modulo_GECE.tribunalpd.show', compact('tribunalpd'));
    }

    
    public function edit($id)
    {
        //
        $tribunalpd = TribunalPD::find($id);
        $estudiante1 = User::pluck('primer_nombre', 'id'); 
        $estudiante2 = User::pluck('primer_nombre', 'id');
        $profesor1 = User::pluck('primer_nombre', 'id');
        $profesor2 = User::pluck('primer_nombre', 'id');
        $secretario = User::pluck('primer_nombre', 'id');
        $presidente = User::pluck('primer_nombre', 'id');
        $miembro = User::pluck('primer_nombre', 'id');
        $oponente = User::pluck('primer_nombre', 'id'); 
        return view('Modulo_GECE.tribunalpd.edit', compact('tribunalpd', 'estudiante1', 'estudiante2', 'profesor1', 'profesor2', 'secretario', 'presidente', 'miembro', 'oponente'));
    }

    public function update(Request $request, TribunalPD $tribunalpd)
    {
        //
        request()->validate(TribunalPD::$rules);

        $tribunalpd->update($request->all());

        return redirect()->route('tribunalpd.index')
            ->with('success', 'Tribunal de Predefensa y Defensa modificado satisfactoriamente!');
    }

    
    public function destroy($id)
    {
        //
        $tribunalpd = TribunalPD::find($id)->delete();

        return redirect()->route('tribunalpd.index')
            ->with('success', 'Tribunal de Predefensa y Defensa eliminado satisfactoriamente!');
    }
}


