<?php
namespace App\Http\Controllers\Modulo_ComisionDisciplinaria;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_ComisionDisciplinaria\Denuncia;
use App\Models\Modulo_ComisionDisciplinaria\Comision_Disciplinaria;
use App\Models\Modulo_ComisionDisciplinaria\Denunciado;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class DenunciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_ComisionDisciplinaria.Denuncia.index')->only('index');
        $this->middleware('can:Modulo_ComisionDisciplinaria.Denuncia.create')->only('create', 'store');
        $this->middleware('can:Modulo_ComisionDisciplinaria.Denuncia.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_ComisionDisciplinaria.Denuncia.destroy')->only('destroy');
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
        $nombrecomision=Comision_Disciplinaria::all();
        $denuncia=DB::table('denuncia')->select('id','id_comision','Nombre_denunciante','descripcion', 'estado', 'created_at')->where('id','LIKE', '%' .$texto. '%')->orWhere('id_comision','LIKE', '%' .$texto. '%')->orWhere('Nombre_denunciante','LIKE', '%' .$texto. '%')->orwhere('descripcion','LIKE', '%' .$texto. '%')->orwhere('estado','LIKE', '%' .$texto. '%')->orWhere('created_at','LIKE', '%' .$texto. '%')->simplePaginate(50);
        $comision_disciplinaria=DB::table('comision__disciplinarias')->select('id','Nombre_comision','Presidente','Miembro','created_at')->where('Nombre_comision','LIKE', '%' .$texto. '%')->simplePaginate(5);
        }
        else if (User::find(auth()->id())->hasRole('Administrador')) {
            $texto=trim($request->get('texto'));
            $nombrecomision=Comision_Disciplinaria::all();
            $denuncia=DB::table('denuncia')->select('id','id_comision','Nombre_denunciante','descripcion', 'estado', 'created_at')->where('id','LIKE', '%' .$texto. '%')->orWhere('id_comision','LIKE', '%' .$texto. '%')->orWhere('Nombre_denunciante','LIKE', '%' .$texto. '%')->orwhere('descripcion','LIKE', '%' .$texto. '%')->orwhere('estado','LIKE', '%' .$texto. '%')->orWhere('created_at','LIKE', '%' .$texto. '%')->simplePaginate(50);
            $comision_disciplinaria=DB::table('comision__disciplinarias')->select('id','Nombre_comision','Presidente','Miembro','created_at')->where('Nombre_comision','LIKE', '%' .$texto. '%')->simplePaginate(5);
        
        }
        
        
        return view('Modulo_ComisionDisciplinaria.Denuncia.index',compact('denuncia','nombrecomision','texto'));
    }

    
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $denuncia['denuncia']=Denuncia::all();
        return view('Modulo_ComisionDisciplinaria.Denuncia.create',$denuncia);
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
            'Nombre_denunciante'=> 'required|regex:/^[A-Z][A-Z,a-z,0-9, ,á,é,í,ó,ú]+$/',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);
         
             $denuncia=Denuncia::create($request->all());
           
         return redirect()->route('Denuncia.index', compact('denuncia'))->with('info', 'adicionar-denuncia');
    }

    public function make_denuncia_notification(){
        user::role([['Administrador']])
        ->each(function(User $user) use ($denuncia){
            $user->notify(new DenNotification($denuncia));
        });
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $denuncia = Denuncia::find($id);
         $nombrecomision= Comision_Disciplinaria::all();
         $denunciado= Denunciado::all()->where('Nombre_denunciado')->where('id_denuncia',$id);
        return view('Modulo_ComisionDisciplinaria.Denuncia.show', compact('denuncia' , 'nombrecomision','denunciado'));
    }
   
   
    
        public function downloadPDF() {
            $denuncia=Denuncia::all();
            $nombrecomision= Comision_Disciplinaria::all();
             view()->share('Modulo_ComisionDisciplinaria.Denuncia.download', $denuncia,$nombrecomision);
            $pdfdenuncia = PDF::loadView('Modulo_ComisionDisciplinaria.Denuncia.download', compact('denuncia' , 'nombrecomision'));
            return $pdfdenuncia->download('denuncias.pdf');
            
    }
    
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $denuncia = Denuncia::find($id);
        $nombrecomision= Comision_Disciplinaria::all();
        return view('Modulo_ComisionDisciplinaria.Denuncia.edit', compact('denuncia' , 'nombrecomision'));
    
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
       
        $nombrecomision['nombrecomision']=Comision_Disciplinaria::all();
        $denuncia = Denuncia::find($id);
        $denuncia->Nombre_denunciante = $request->get('Nombre_denunciante');
        $denuncia->descripcion = $request->get('descripcion');
        $denuncia->id_comision = $request->get('id_comision');
        $denuncia->estado = $request->get('estado');
        $this->validate($request,[
            'Nombre_denunciante'=> 'required|regex:/^[A-Z][A-Z,a-z,0-9, ,á,é,í,ó,ú]+$/',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);
        
         $denuncia->save();
         return redirect()->route('Denuncia.index', compact('denuncia'))->with('info', 'modificar-denuncia');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denuncia $denuncia, $id)
    {
        $denuncia = Denuncia::find($id);
        $denuncia->delete();

        return redirect()->route('Denuncia.index')->with('info', 'eliminar-denuncia');
    }

}


