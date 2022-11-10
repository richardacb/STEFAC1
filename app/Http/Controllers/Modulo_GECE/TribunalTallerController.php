<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\TribunalTaller;


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
        
        return view('Modulo_GECE.tribunaltaller.create', compact('tribunaltaller'));
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
        //
        $tribunaltaller = TribunalTaller::find($id);

        return view('Modulo_GECE.tribunaltaller.show', compact('tribunaltaller'));
    }

    
    public function edit($id)
    {
        //
        $tribunaltaller = TribunalTaller::find($id);
        
        return view('Modulo_GECE.tribunaltaller.edit', compact('tribunaltaller'));
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

