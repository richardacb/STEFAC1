<?php

namespace App\Http\Controllers\Modulo_GECE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_GECE\Deposito;
use App\Models\Modulo_GECE\Documento;


class DepositoController extends Controller
{
    
    public function index()

    {
        
        $deposito = Deposito::paginate(10);
        $documentos = Documento::all();

        return view('Modulo_GECE.deposito.index', compact('deposito'))
            ->with('i', (request()->input('page', 1) - 1) * $deposito->perPage())
            ->with('documentos', $documentos);
    }

    
    public function create()
    {
        $deposito = new Deposito();
        
        return view('Modulo_GECE.deposito.create', compact('deposito'));
    }

    
    public function store(Request $request)
    {
        request()->validate(Deposito::$rules);

        $deposito = Deposito::create($request->all());

        return redirect()->route('deposito.index')
            ->with('success', 'Depósito de documentos creado satisfactoriamente!.');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
