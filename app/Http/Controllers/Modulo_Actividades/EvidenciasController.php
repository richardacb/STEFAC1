<?php

namespace App\Http\Controllers\Modulo_Actividades;

use App\Http\Controllers\Controller;
use App\Models\Modulo_Actividades\Actividades;
use GuzzleHttp\Psr7\MimeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Modulo_Actividades\Evidencias;
use Illuminate\Contracts\Validation\Validator;
use Spatie\Permission\Models\Role;
use Symfony\Component\Mime\MimeTypes;

class EvidenciasController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Modulo_Actividades.evidencias.index')->only('index');
        $this->middleware('can:Modulo_Actividades.evidencias.create')->only('create', 'store');
        $this->middleware('can:Modulo_Actividades.evidencias.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_Actividades.evidencias.destroy')->only('destroy');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evidencias= Evidencias::all();
        $actividades= Actividades::all();

        $count_act_1 = count(DB::table("actividades")->join("evidencias", "actividades.id", "=", "actividades_id")->where("tipo_actividad","Político Ideológico")->get());
        $count_act_2 = count(DB::table("actividades")->join("evidencias", "actividades.id", "=", "actividades_id")->where("tipo_actividad","Académico")->get());
        $count_act_3 = count(DB::table("actividades")->join("evidencias", "actividades.id", "=", "actividades_id")->where("tipo_actividad","Investigativa")->get());
        $count_act_4 = count(DB::table("actividades")->join("evidencias", "actividades.id", "=", "actividades_id")->where("tipo_actividad","Extensión Universitaria")->get());




        return view('Modulo_Actividades.evidencias.index', compact('evidencias','actividades', 'count_act_1', 'count_act_2', 'count_act_3', 'count_act_4'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $role = Role::all();
        $actividad= Actividades::pluck('nombre','id')->toArray();
        $actividad1= Actividades::pluck('año','id')->toArray();
        $actividad2= Actividades::pluck('tipo_actividad','id')->toArray();
        return view('Modulo_Actividades.evidencias.create', compact('actividad','actividad1','actividad2', 'role'));

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
            'actividades_id' => 'required',
            'descripcion' => 'required',
            'imagen'=> 'required',

             ];
             $messages = [
                'actividades_id.required'=>'Debe selecionar una actividad',
                'descripcion.required' =>'Debe insertar la descripcion de la evidencia',
                'imagen.required'=>'La imagen seleccionada no es correcta',
             ];

             $this->validate( $request, $rules, $messages);

             $role = Role::all();


             if($evidencia = $request->file('imagen')){
                $nombre = $evidencia->getClientOriginalName();
                $evidencia->move('imagenes',$nombre);
                $evidencia = $request->all();
                $evidencia['imagen']=$nombre;
                $evidencia= Evidencias::create($evidencia);
             }

             return redirect()->route('evidencias.index',compact('evidencia', 'role'))->with('info','adicionar-evidencia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::all();
        $evidencias = Evidencias::findOrFail($id);

        $actividad= Actividades::pluck('nombre','id')->toArray();
        $actividad1= Actividades::pluck('año','id')->toArray();
        $actividad2= Actividades::pluck('tipo_actividad','id')->toArray();

        return view('Modulo_Actividades.evidencias.edit', compact('evidencias', 'actividad','actividad1','actividad2', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  $evidencias = Evidencias::findOrFail($id);
        $rules = [
            'actividades_id' => 'required',
            'descripcion' => 'required',
            'imagen'=> 'required',
             ];
             $messages = [
                'actividades_id.required'=>'Debe selecionar una actividad',
                'descripcion.required' =>'Debe insertar la descripcion de la evidencia',
                'imagen.required'=>'La imagen seleccionada no es correcta',
             ];

             $this->validate( $request, $rules, $messages);

             $role = Role::all();

             if($evidencia = $request->file('imagen')){
                $nombre = $evidencia->getClientOriginalName();
                $evidencia->move('imagenes',$nombre);
                $evidencias = $request->all();
                $evidencias['imagen']=$nombre;
             }
                $evidencias->update($evidencias);

             return redirect()->route('evidencias.index', compact('evidencias', 'role'))->with('info', 'modificar-evidencia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::all();
        $evidencia = Evidencias::findOrFail($id);

        $evidencia->delete();

        return redirect()->route('evidencias.index', compact('role'))->with('info', 'eliminar-evidencia');
    }
}
