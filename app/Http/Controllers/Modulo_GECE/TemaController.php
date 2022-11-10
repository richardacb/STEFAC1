<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\Tema;


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
        //
        $tema = new Tema();
        
        return view('Modulo_GECE.temas.create', compact('tema'));
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
        //
        $tema = Tema::find($id);

        return view('Modulo_GECE.temas.show', compact('tema'));
    }

    
    public function edit($id)
    {
        //
        $tema = Tema::find($id);
        
        return view('Modulo_GECE.temas.edit', compact('tema'));
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
