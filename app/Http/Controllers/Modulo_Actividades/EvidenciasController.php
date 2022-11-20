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
use App\Models\User;

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
        $evidencias = Evidencias::all();
        $actividades = Actividades::all();
        session()->put('tipo_de_usuario', User::find(auth()->id())->tipo_de_usuario);
        session()->put('anno', User::find(auth()->id())->anno);
        $tipo_usuario = session()->get('tipo_de_usuario');
        $anno= session()->get('anno');
        $id = auth()->id();
        $users = User::all();

        $count_act_1 = count(DB::table("actividades")->join("evidencias", "actividades.id", "=", "actividades_id")->where("tipo_actividad","Político Ideológico")->get());
        $count_act_2 = count(DB::table("actividades")->join("evidencias", "actividades.id", "=", "actividades_id")->where("tipo_actividad","Académico")->get());
        $count_act_3 = count(DB::table("actividades")->join("evidencias", "actividades.id", "=", "actividades_id")->where("tipo_actividad","Investigativa")->get());
        $count_act_4 = count(DB::table("actividades")->join("evidencias", "actividades.id", "=", "actividades_id")->where("tipo_actividad","Extensión Universitaria")->get());

        return view('Modulo_Actividades.evidencias.index', compact('evidencias','actividades', 'count_act_1', 'count_act_2', 'count_act_3', 'count_act_4', 'users', 'tipo_usuario', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        session()->put('anno', User::find(auth()->id())->anno);
        session()->put('tipo_de_usuario', User::find(auth()->id())->tipo_de_usuario);
        $anno= session()->get('anno');

        $evidencias = Evidencias::all();

        $actividad= Actividades::pluck('nombre','id')->toArray();
        $actividad1= Actividades::pluck('año','id')->toArray();

        //var_dump($users);
        if(session()->get('tipo_de_usuario') == 'Profesor'){
            $users = DB::select('SELECT users.id,  CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_estudiante
            FROM users WHERE users.id AND users.tipo_de_usuario = "Estudiante" AND users.anno = ' . $anno . '
            ');

            return view('Modulo_Actividades.evidencias.create', compact('actividad','actividad1','users'));

            }

        if(session()->get('tipo_de_usuario') == 'Estudiante'){
            // $estudiantes = Estudiante::all()->where('anno',session()->get('anno'));
            $users = null;
            return view('Modulo_Actividades.evidencias.create', compact('actividad', 'actividad1','users'));

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tu= session()->get('tipo_de_usuario');
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

             //$role = Role::all();


             if($evidencia = $request->file('imagen')){
                $rutaGuardarImg = 'imagen/';
                $imagenEvidencia = $evidencia->getClientOriginalName().".".$evidencia->getClientOriginalExtension();
                $evidencia->move($rutaGuardarImg, $imagenEvidencia);

                $evidencia = $request->all();
                $evidencia['imagen']=$imagenEvidencia;
                $evidencia['user_id'] = $tu == "Profesor"? $request->user_id : auth()->id();
                $evidencia= Evidencias::create($evidencia);
             }

             return redirect()->route('evidencias.index',compact('evidencia'))->with('info','adicionar-evidencia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evidencia = Evidencias::findOrFail($id);
        $actividades= Actividades::all();
        $users = User::all();

        return view('Modulo_Actividades.evidencias.show', compact('evidencia', 'actividades', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $evidencias = Evidencias::findOrFail($id);

        $actividad= Actividades::pluck('nombre','id')->toArray();
        $actividad1= Actividades::pluck('año','id')->toArray();


        return view('Modulo_Actividades.evidencias.edit', compact('evidencias', 'actividad','actividad1'));
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

             ];
             $messages = [
                'actividades_id.required'=>'Debe selecionar una actividad',
                'descripcion.required' =>'Debe insertar la descripcion de la evidencia',

             ];

             $this->validate( $request, $rules, $messages);



             if($evidencia = $request->file('imagen')){
                $rutaGuardarImg = 'imagen/';
                $img = "img".auth()->id()."".$evidencias->actividades_id;
                $imagenEvidencia = auth()->id()."". $evidencia->getClientOriginalName().".".$evidencia->getClientOriginalExtension();
                $evidencia->move($rutaGuardarImg, $imagenEvidencia);
                $evidencia= $imagenEvidencia;
             }
             else{
                unset($request->file);
             }

            //  $evidencias->descripcion = $request->get('descripcion');
            //  $evidencias->user_id = $request->get('user_id');
            //  $evidencias->actividades_id = $request->get('actividades_id');
            //  $evidencias->imagen = $request->get('imagen');
            //  $evidencias->estado = $request->get('estado');

             $evidencias->update($request->all());

             return redirect()->route('evidencias.index', compact('evidencias'))->with('info', 'modificar-evidencia');
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
