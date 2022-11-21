<?php
namespace App\Http\Controllers\Modulo_ComisionDisciplinaria;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_ComisionDisciplinaria\Declaraciones;
use App\Models\Modulo_ComisionDisciplinaria\Expediente;
use App\Models\Modulo_ComisionDisciplinaria\Denunciado;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class DeclaracionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(User::find(auth()->id())->hasRole('ProfesorMiembroComision')){
       
        $declaraciones=Declaraciones::all();
        $expediente=Expediente::all();
      
        }
        else if (User::find(auth()->id())->hasRole('Administrador')) {
            $texto=trim($request->get('texto'));
            $declaraciones=Declaraciones::all();
            $expediente=Expediente::all();
          
        
        }
            return view('Modulo_ComisionDisciplinaria.Declaraciones.index',compact('expediente','declaraciones'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expediente['expediente']=Expediente::all();
        $denunciado['denunciado']=Denunciado::all();
        
        return view('Modulo_ComisionDisciplinaria.Declaraciones.create',$expediente,$denunciado);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Nombre_declarante' =>  'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'cargo' =>'required',
            'declaracion_hechos' => 'required|string :min 10 and :max 200',
            'id_expediente'=> 'required',
        ]);
        
    
         
             $declaraciones=Declaraciones::create($request->all());
 
         return redirect()->route('Declaraciones.index', compact('declaraciones'))->with('info', 'adicionar-declaracion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $declaraciones = Declaraciones::find($id);
        $expediente=Expediente::all();
        return view('Modulo_ComisionDisciplinaria.Declaraciones.show', compact('declaraciones','expediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $declaraciones = Declaraciones::find($id);
        $expediente= Expediente::all();
        return view('Modulo_ComisionDisciplinaria.Declaraciones.edit', compact('declaraciones' , 'expediente'));
    
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
        $declaraciones = Declaraciones::find($id);
        $this->validate($request,[
            'Nombre_declarante' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'cargo' => 'required',
            'declaracion_hechos' => 'required',
            'id_expediente'=> 'required',
        ]);
        
        $expediente['expediente']=Expediente::all();
       
        $declaraciones->Nombre_declarante = $request->get('Nombre_declarante');
        $declaraciones->cargo = $request->get('cargo');
        $declaraciones->declaracion_hechos = $request->get('declaracion_hechos');
        $declaraciones->id_expediente = $request->get('id_expediente');
        
        

        $declaraciones->update($request->all());
         return redirect()->route('Declaraciones.index', compact('declaraciones'))->with('info', 'modificar-declaracion');
    }
    public function downloadPDF() {
        $declaraciones=Declaraciones::all();
        $expediente= Expediente::all();
        view()->share('Modulo_ComisionDisciplinaria.Declaraciones.download',  $declaraciones);
        $pdfdeclaraciones = PDF::loadView('Modulo_ComisionDisciplinaria.Declaraciones.download', compact('declaraciones', 'expediente'));
        return $pdfdeclaraciones->download('declaraciones.pdf');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Declaraciones $declaraciones, $id)
    {
        $declaraciones = Declaraciones::find($id);
        $declaraciones->delete();

        return redirect()->route('Declaraciones.index')->with('info', 'eliminar-declaracion');
    }
}
