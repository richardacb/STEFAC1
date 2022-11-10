<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\Reporte;


class ReporteController extends Controller
{
    
    public function index()
    {
        //
        $reporte = Reporte::paginate();

        return view('Modulo_GECE.reportes.index', compact('reporte'))
            ->with('i', (request()->input('page', 1) - 1) * $reporte->perPage());
    }

    
    public function create()
    {
        //
        $reporte = new Reporte();
        
        return view('Modulo_GECE.reportes.create', compact('reporte'));
    }

    public function store(Request $request)
    {
        //
        request()->validate(Reporte::$rules);

        $reporte = Reporte::create($request->all());

        return redirect()->route('reportes.index')
            ->with('success', 'Reporte creado satisfactoriamente!.');
    }

    
    public function show($id)
    {
        //
        $reporte = Reporte::find($id);

        return view('Modulo_GECE.reportes.show', compact('reporte'));
    }

    
    public function edit($id)
    {
        //
        $reporte = Reporte::find($id);
        
        return view('Modulo_GECE.reportes.edit', compact('reporte'));
    }

   
    public function update(Request $request, Reporte $reporte)
    {
        //
        request()->validate(Reporte::$rules);

        $reporte->update($request->all());

        return redirect()->route('reportes.index')
            ->with('success', 'Reporte modificado satisfactoriamente!');
    }

    
    public function destroy($id)
    {
        //
        $reporte = Reporte::find($id)->delete();

        return redirect()->route('reportes.index')
            ->with('success', 'Reporte borrado satisfactoriamente!');
    }
}

