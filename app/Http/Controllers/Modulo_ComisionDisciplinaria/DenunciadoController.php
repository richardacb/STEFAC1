<?php


namespace App\Http\Controllers\Modulo_ComisionDisciplinaria;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_ComisionDisciplinaria\Denunciado;
use App\Models\Modulo_ComisionDisciplinaria\Denuncia;
use App\Models\Modulo_ComisionDisciplinaria\Expediente;
use App\Models\Modulo_ComisionDisciplinaria\Declaraciones;
use App\Models\Modulo_ComisionDisciplinaria\Comision_Disciplinaria;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DenunciadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_ComisionDisciplinaria.Denunciado.index')->only('index');
        $this->middleware('can:Modulo_ComisionDisciplinaria.Denunciado.create')->only('create', 'store');
        $this->middleware('can:Modulo_ComisionDisciplinaria.Denunciado.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_ComisionDisciplinaria.Denunciado.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        if(User::find(auth()->id())->hasRole('Decano')){
        $texto=trim($request->get('texto'));
        $denuncia=Denuncia::all();
        $denunciado=DB::table('denunciado')->select('id','id_denuncia','Nombre_denunciado','created_at')->where('id','LIKE', '%' .$texto. '%')->orWhere('id_denuncia','LIKE', '%' .$texto. '%')->orWhere('Nombre_denunciado','LIKE', '%' .$texto. '%')->orWhere('created_at','LIKE', '%' .$texto. '%')->simplePaginate(5);
        }
        else if (User::find(auth()->id())->hasRole('Administrador')) {
       
            $texto=trim($request->get('texto'));
            $denuncia=Denuncia::all();
            $denunciado=DB::table('denunciado')->select('id','id_denuncia','Nombre_denunciado','created_at')->where('id','LIKE', '%' .$texto. '%')->orWhere('id_denuncia','LIKE', '%' .$texto. '%')->orWhere('Nombre_denunciado','LIKE', '%' .$texto. '%')->orWhere('created_at','LIKE', '%' .$texto. '%')->simplePaginate(5);
        }
       
        return view('Modulo_ComisionDisciplinaria.Denunciado.index', compact('denunciado','denuncia','texto'));
        
        
    }

    
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anno  = session()->get('anno');

   
        
         $users = DB::select('SELECT users.id,users.anno, users.primer_nombre,users.segundo_nombre,users.primer_apellido,users.segundo_apellido
         FROM users WHERE users.id AND users.tipo_de_usuario = "Estudiante" Order by primer_nombre
         ');
       
        $denuncia=(DB::table('denuncia')->where("estado", "Nueva")->get());
        return view('Modulo_ComisionDisciplinaria.Denunciado.create',compact('users','denuncia'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
         
        $denunciado=Denunciado::create($request->all());
 
         return redirect()->route('Denunciado.index', compact('denunciado'))->with('info', 'adicionar-denunciado');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $denunciado = Denunciado::find($id);
         $expediente= Expediente::all();
         $denuncia=Denuncia::all();
         $declaraciones= Declaraciones::all();
        return view('Modulo_ComisionDisciplinaria.Denunciado.show', compact('denunciado' , 'expediente' , 'declaraciones', 'denuncia'));
    }
   
    
        public function downloadPDF() {
            $denunciado=Denunciado::all();
            $nombredenuncia= Denuncia::all();
            view()->share('Modulo_ComisionDisciplinaria.Denunciado.download', $denunciado,$nombredenuncia);
            $pdf = PDF::loadView('Modulo_ComisionDisciplinaria.Denunciado.download', compact('denunciado' , 'nombredenuncia'));
            return $pdf->download('denunciados.pdf');
    }
    
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Denunciado $denunciado, $id )
    {
        $users = DB::select('SELECT users.id,users.anno, users.primer_nombre,users.segundo_nombre,users.primer_apellido,users.segundo_apellido
        FROM users WHERE users.id AND users.tipo_de_usuario = "Estudiante" Order by primer_nombre
        ');
         $denunciado = Denunciado::find($id);
         $denuncia=Denuncia::all();
        return view('Modulo_ComisionDisciplinaria.Denunciado.edit', compact('denunciado','denuncia','users'));
       
        
       
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
        $denuncia=Denuncia::all();
        $denunciado = Denunciado::find($id);
        $denunciado->Nombre_denunciado = $request->get('Nombre_denunciado');
         $denunciado->id_denuncia = $request->get('id_denuncia');
         $request->validate([
            'Nombre_denunciado' => 'required',
            
             ]);
        
        /*$denuncia=Denuncia::update($request->all());*/
         $denunciado->save();
         return redirect()->route('Denunciado.index', compact('denunciado','denuncia'))->with('info', 'modificar-denunciado');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denunciado $denunciado, $id)
    {
        $denunciado = Denunciado::find($id);
        $denunciado->delete();

        return redirect()->route('Denunciado.index')->with('info', 'eliminar-denunciado');;
    }

}
