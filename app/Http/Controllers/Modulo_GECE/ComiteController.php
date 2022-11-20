<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\Comite;


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
        
        return view('Modulo_GECE.comite.create', compact('comite'));
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
        
        return view('Modulo_GECE.comite.edit', compact('comite'));
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
