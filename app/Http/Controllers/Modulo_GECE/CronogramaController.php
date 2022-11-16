<?php

namespace App\Http\Controllers\Modulo_GECE;
use App\Http\Controllers\Controller;
use App\Models\Modulo_GECE\Cronograma;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CronogramaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:Modulo_GECE.cronograma.index')->only('index');
    //     $this->middleware('can:Modulo_GECE.cronograma.create')->only('create', 'store');
    //     $this->middleware('can:Modulo_GECE.cronograma.edit')->only('edit', 'update');
    //     $this->middleware('can:Modulo_GECE.cronograma.destroy')->only('destroy');
    // }
    public function index()
    {
        //
        return view('Modulo_GECE.cronograma.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate(Cronograma::$rules);
        $cronograma = Cronograma::create($request->all());
    }

    
    public function show(Cronograma $cronograma)
    {
        //
        $cronograma = Cronograma::all();
        return response()->json($cronograma);

    }

    
    public function edit(Cronograma $cronograma)
    {
        //
    }

    
    public function update(Request $request, Cronograma $cronograma)
    {
        //
    }

   
    public function destroy(Cronograma $cronograma)
    {
        //
    }
}
