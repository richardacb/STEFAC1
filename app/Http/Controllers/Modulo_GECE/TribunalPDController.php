<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\TribunalPD;


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
        
        return view('Modulo_GECE.tribunalpd.create', compact('tribunalpd'));
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
        //
        $tribunalpd = TribunalPD::find($id);

        return view('Modulo_GECE.tribunalpd.show', compact('tribunalpd'));
    }

    
    public function edit($id)
    {
        //
        $tribunalpd = TribunalPD::find($id);
        
        return view('Modulo_GECE.tribunalpd.edit', compact('tribunalpd'));
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


