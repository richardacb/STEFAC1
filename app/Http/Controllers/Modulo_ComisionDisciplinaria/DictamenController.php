<?php
namespace App\Http\Controllers\Modulo_ComisionDisciplinaria;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_ComisionDisciplinaria\Dictamen;
use App\Models\Modulo_ComisionDisciplinaria\Expediente;
use Illuminate\Support\Facades\DB;

class DictamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
       
        $dictamen=Dictamen::all();
        $expediente=Expediente::all();
       

        
        return view('Modulo_ComisionDisciplinaria.Dictamen.index',compact('expediente','dictamen'));
    
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expediente['expediente']=Expediente::all();
        return view('Modulo_ComisionDisciplinaria.Dictamen.create',$expediente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'hechos' => 'required',
            'atenuantes' => 'required',
            'agravantes' => 'required',
            'resultadosexpacd' => 'required',
            'tipofalta' => 'required',
            'medida' => 'required',
            'id_expediente'=>'required|unique:dictamen,id_expediente',
        ];
        
        $this->validate($request, $rules);

       
         
             $dictamen=Dictamen::create($request->all());
 
         return redirect()->route('Dictamen.index', compact('dictamen'))->with('info', 'adicionar-dictamen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dictamen=Dictamen::find($id);
        $expediente=Expediente::all();
        return view('Modulo_ComisionDisciplinaria.Dictamen.show', compact('dictamen','expediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dictamen=Dictamen::find($id);
        $expediente= Expediente::all();
        return view('Modulo_ComisionDisciplinaria.Dictamen.edit', compact('dictamen' , 'expediente'));
    
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
        $expediente['expediente']=Expediente::all();
        $dictamen = Dictamen::find($id);
        $dictamen->hechos = $request->get('hechos');
        $dictamen-> atenuantes = $request->get('atenuantes');
        $dictamen->agravantes = $request->get('agravantes');
        $dictamen->resultadosexpacd = $request->get('resultadosexpacd');
        $dictamen->tipofalta = $request->get('tipofalta');
        $dictamen-> medida = $request->get('medida');
        $dictamen->id_expediente = $request->get('id_expediente');
      
        $dictamen->save();
         return redirect()->route('Dictamen.index', compact('dictamen'))->with('info', 'modificar-dictamen');
    }

    public function downloadPDF() {
       
        $dictamen=Dictamen::all();
        $expediente=Expediente::all();
        view()->share('Modulo_ComisionDisciplinaria.Dictamen.download',  $dictamen);
        $pdfdictamen = PDF::loadView('Modulo_ComisionDisciplinaria.Dictamen.download', compact('expediente' , 'dictamen'));
        return $pdfdictamen->download('dictamen.pdf');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dictamen $dictamen, $id)
    {
        $dictamen = Dictamen::find($id);
        $dictamen->delete();

        return redirect()->route('Dictamen.index')->with('info', 'eliminar-dictamen');
    }
}
