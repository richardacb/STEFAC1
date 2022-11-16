<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\Perfil;


class PerfilController extends Controller
{
    
    public function index()
    {
        //
        $perfil = Perfil::paginate();

        return view('Modulo_GECE.perfil.index', compact('perfil'))
            ->with('i', (request()->input('page', 1) - 1) * $perfil->perPage());
    }

    
    public function create()
    {
        //
        $perfil = new Perfil();
        
        return view('Modulo_GECE.perfil.create', compact('perfil'));
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
        //
        $perfil = Perfil::find($id);

        return view('Modulo_GECE.perfil.show', compact('perfil'));
    }

   
    public function edit($id)
    {
        //
        $perfil = Perfil::find($id);
        
        return view('Modulo_GECE.perfil.edit', compact('perfil'));
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
