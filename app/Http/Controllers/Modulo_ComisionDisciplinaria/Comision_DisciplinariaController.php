<?php
namespace App\Http\Controllers\Modulo_ComisionDisciplinaria;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_ComisionDisciplinaria\Comision_Disciplinaria;
use App\Models\Modulo_ComisionDisciplinaria\Denuncia;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\DB;







class Comision_DisciplinariaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_ComisionDisciplinaria.Comision_disciplinaria.index')->only('index');
        $this->middleware('can:Modulo_ComisionDisciplinaria.Comision_disciplinaria.create')->only('create', 'store');
        $this->middleware('can:Modulo_ComisionDisciplinaria.Comision_disciplinaria.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_ComisionDisciplinaria.Comision_disciplinaria.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(User::find(auth()->id())->hasRole('Decano')){
        $comision_disciplinaria=Comision_Disciplinaria::all();
        }
        else if (User::find(auth()->id())->hasRole('Administrador')) {
            $comision_disciplinaria=Comision_Disciplinaria::all();
        }
            return view('Modulo_ComisionDisciplinaria.Comision_disciplinaria.index', compact('comision_disciplinaria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $comision_disciplinaria=Comision_Disciplinaria::all();
        return view('Modulo_ComisionDisciplinaria.Comision_disciplinaria.create', $comision_disciplinaria);
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
            'Nombre_comision' => 'required|regex:/^[A-Z][A-Z,a-z,0-9, ,á,é,í,ó,ú]+$/',
            'Presidente' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'Miembro' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'miemb' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
        ]);
       
      
        $comision_disciplinaria=Comision_Disciplinaria::create($request->all());

        return redirect()->route('Comision_disciplinaria.index')->with('info', 'adicionar-comision');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comision_disciplinaria=Comision_Disciplinaria::find($id);
        $denuncia=Denuncia::all()->where('id_comision')->where('id_comision',$id);
        $denuncia=Denuncia::all()->where('Nombre_denunciante')->where('id_comision',$id);
        $denuncia=Denuncia::all()->where('descripcion')->where('id_comision',$id);
        
        
        return view('Modulo_ComisionDisciplinaria.Comision_disciplinaria.show', compact('comision_disciplinaria', 'denuncia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comision_disciplinaria = Comision_Disciplinaria::find($id);
return view('Modulo_ComisionDisciplinaria.Comision_disciplinaria.edit', compact('comision_disciplinaria'))->with('Comision_Disciplinaria , $comision_disciplinaria');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $comision_disciplinaria = Comision_Disciplinaria::find($id);
        $this->validate($request,[
            'Nombre_comision' => 'required|regex:/^[A-Z][A-Z,a-z,0-9, ,á,é,í,ó,ú]+$/',
            'Presidente' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'Miembro' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'miemb' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
        ]);
    $comision_disciplinaria->update($request->all());
        return redirect()->route('Comision_disciplinaria.index')->with('info', 'modificar-comision');
    }
    
    public function downloadPDF() {
        $comision_disciplinaria=Comision_Disciplinaria::all();
        view()->share('Modulo_ComisionDisciplinaria.Comision_disciplinaria.download',  $comision_disciplinaria);
        $pdfcomision = PDF::loadView('Modulo_ComisionDisciplinaria.Comision_disciplinaria.download', compact('comision_disciplinaria'));
        return $pdfcomision->download('comisiones.pdf');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comision_disciplinaria = Comision_Disciplinaria::find($id);
        $comision_disciplinaria->delete();
        
        return redirect()->route('Comision_disciplinaria.index')->with('info', 'eliminar-comision');
    }



    
}
