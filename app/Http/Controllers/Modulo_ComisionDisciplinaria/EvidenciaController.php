<?php
namespace App\Http\Controllers\Modulo_ComisionDisciplinaria;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_ComisionDisciplinaria\Evidencia;
use App\Models\Modulo_ComisionDisciplinaria\Expediente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class EvidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          
       
        $evidencia=Evidencia::all();
        $expediente=Expediente::all();
        
        return view('Modulo_ComisionDisciplinaria.Evidencia.index',compact('expediente','evidencia'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expediente['expediente']=Expediente::all();
    
        return view('Modulo_ComisionDisciplinaria.Evidencia.create',$expediente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $evidencia= request()->except('_token');
            
             
                $evidencia['Imagen']=$request->file('Imagen')->store('imagenes','public');
            
                $evidencia['Video']=$request->file('Video')->store('imagenes','public');
             
         
             Evidencia::insert($evidencia);
 
         return redirect()->route('Evidencia.index', compact('evidencia'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evidencia = Evidencia::find($id);
        $expediente=Expediente::all();
        return view('Modulo_ComisionDisciplinaria.Evidencia.show', compact('evidencia','expediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evidencia = Evidencia::find($id);
        $expediente= Expediente::all();
        return view('Modulo_ComisionDisciplinaria.Evidencia.edit', compact('evidencia' , 'expediente'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
     
        $evidencia= request()->except('_token');
            
             
        $evidencia['Imagen']=$request->file('Imagen')->update('imagenes','public');
    
        $evidencia['Video']=$request->file('Video')->update('imagenes','public');
     
 
     Evidencia::insert($evidencia);
        
        
         return redirect()->route('Evidencia.index', compact('evidencia'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evidencia $evidencia, $id)
    {
        $evidencia = Evidencia::find($id);
        $evidencia->delete();

        return redirect()->route('Evidencia.index')->with('info', 'eliminar-evidencia');
    }
}
