<?php
namespace App\Http\Controllers\Modulo_ComisionDisciplinaria;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_ComisionDisciplinaria\Expediente;
use App\Models\Modulo_ComisionDisciplinaria\Denunciado;
use App\Models\Modulo_ComisionDisciplinaria\Denuncia;
use App\Models\Modulo_ComisionDisciplinaria\Declaraciones;
use App\Models\Modulo_ComisionDisciplinaria\Opiniones;
use App\Models\Modulo_ComisionDisciplinaria\Evidencia;
use App\Models\Modulo_ComisionDisciplinaria\Dictamen;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ExpedienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_ComisionDisciplinaria.Expediente.index')->only('index');
        $this->middleware('can:Modulo_ComisionDisciplinaria.Expediente.create')->only('create', 'store');
        $this->middleware('can:Modulo_ComisionDisciplinaria.Expediente.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_ComisionDisciplinaria.Expediente.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
    
            if(User::find(auth()->id())->hasRole('ProfesorMiembroComision')){
       
        $denunciado=Denunciado::all();
        $denuncia=Denuncia::all();
        $expediente=Expediente::all();
            }
       
        else if (User::find(auth()->id())->hasRole('Administrador')) {
            $denunciado=Denunciado::all();
            $denuncia=Denuncia::all();
            $expediente=Expediente::all();
        }
         return view('Modulo_ComisionDisciplinaria.Expediente.index',compact('expediente', 'denuncia', 'denunciado'));
    } 
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      
         $denunciado=Denunciado::all();
         $denuncia=(DB::table('denuncia')->where("estado", "En proceso")->get());
         
      $expediente=Expediente::all();
      return view('Modulo_ComisionDisciplinaria.Expediente.create',compact('expediente','denunciado','denuncia'));
    
    }
   


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $denuncia=Denuncia::all();
        $denunciado=Denunciado::all();
        $expediente=Expediente::create($request->all());
         return redirect()->route('Expediente.index', compact('expediente','denunciado','denuncia'));
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
       
        $expediente = Expediente::find($id);
        $denunciado=Denunciado::all();
        $denuncia=Denuncia::all();
        $declaraciones=Declaraciones::all()->where('Nombre_declarante')->where('id_expediente',$id);
        $declaraciones=Declaraciones::all()->where('cargo')->where('id_expediente',$id);
        $declaraciones=Declaraciones::all()->where('declaracion_hechos')->where('id_expediente',$id);
        $opiniones=Opiniones::all()->where('Nombre')->where('id_expediente',$id);
        $opiniones=Opiniones::all()->where('responsabilidad')->where('id_expediente',$id);
        $opiniones=Opiniones::all()->where('descripcion')->where('id_expediente',$id);
        $dictamen=Dictamen::all()->where('hechos')->where('id_expediente',$id);
        $dictamen=Dictamen::all()->where('atenuantes')->where('id_expediente',$id);
        $dictamen=Dictamen::all()->where('agravantes')->where('id_expediente',$id);
        $dictamen=Dictamen::all()->where('resultadosexpacd')->where('id_expediente',$id);
        $dictamen=Dictamen::all()->where('tipofalta')->where('id_expediente',$id);
        $dictamen=Dictamen::all()->where('medida')->where('id_expediente',$id);
        return view('Modulo_ComisionDisciplinaria.Expediente.show', compact('expediente', 'denunciado','declaraciones', 'opiniones', 'dictamen','denuncia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expediente = Expediente::find($id);
       $denunciado=Denunciado::all();
       $denuncia=Denuncia::all();
    return view('Modulo_ComisionDisciplinaria.Expediente.edit', compact('expediente' , 'denunciado', 'denuncia'));
    
    }
    
    public function downloadPDF() {
        $expediente = Expediente::all();
        $denunciado= Denunciado::all();
        $denuncia=Denuncia::all();
        view()->share('Modulo_Comisiondisciplinaria.Expediente.download',  $expediente,$denunciado,$denuncia);
        $pdf = PDF::loadView('Modulo_Comisiondisciplinaria.Expediente.download', compact('expediente' , 'denunciado','denuncia'));
        return $pdf->download('expedientes.pdf');
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
        $denunciado['denunciado']=Denunciado::all();
        $denuncia=Denuncia::all();
        $expediente = Expediente::find($id);
        
        $expediente->id_denunciado = $request->get('id_denunciado');
        $expediente->save();
         return redirect()->route('Expediente.index', compact('expediente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expediente $expediente, $id)
    {
        $expediente = Expediente::find($id);
        $expediente->delete();

        return redirect()->route('Expediente.index');
    }
}
