<?php
namespace App\Http\Controllers\Modulo_ComisionDisciplinaria;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_ComisionDisciplinaria\Opiniones;
use App\Models\Modulo_ComisionDisciplinaria\Expediente;
use Illuminate\Support\Facades\DB;

class OpinionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          
        
        $opiniones=Opiniones::all();
        $expediente=Expediente::all();
       
        return view('Modulo_ComisionDisciplinaria.Opiniones.index',compact('expediente','opiniones'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expediente['expediente']=Expediente::all();
        
        
        return view('Modulo_ComisionDisciplinaria.Opiniones.create',$expediente);
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
            'Nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'responsabilidad' => 'required',
            'descripcion' => 'required',
            'id_expediente'=> 'required',
        ]);
        
         
             $opiniones=Opiniones::create($request->all());
 
         return redirect()->route('Opiniones.index', compact('opiniones'))->with('info', 'adicionar-opinionees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $opiniones = Opiniones::find($id);
        $expediente=Expediente::all();
        return view('Modulo_ComisionDisciplinaria.Opiniones.show', compact('opiniones','expediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $opiniones = Opiniones::find($id);
        $expediente= Expediente::all();
        return view('Modulo_ComisionDisciplinaria.Opiniones.edit', compact('opiniones' , 'expediente'));
    
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
        $opiniones = Opiniones::find($id);
        $this->validate($request,[
            'Nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'responsabilidad' => 'required',
            'descripcion' => 'required',
            'id_expediente'=> 'required',
        ]);
        

        
        
    
        $opiniones->update($request->all());
         return redirect()->route('Opiniones.index')->with('info', 'modificar-opiniones');
    }
    public function downloadPDF() {
        $opiniones=Opiniones::all();
        $expediente= Expediente::all();
        view()->share('Modulo_ComisionDisciplinaria.Opiniones.download',  $opiniones);
        $pdfopiniones = PDF::loadView('Modulo_ComisionDisciplinaria.Opiniones.download', compact('opiniones', 'expediente'));
        return $pdfopiniones->download('opiniones.pdf');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opiniones $opiniones, $id)
    {
        $opiniones = Opiniones::find($id);
        $opiniones->delete();

        return redirect()->route('Opiniones.index')->with('info', 'eliminar-opiniones');
    }
}
