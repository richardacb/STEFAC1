<?php

namespace App\Http\Controllers\Modulo_PerfildeUsuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_PerfildeUsuario\Estudiantes;
use App\Models\Modulo_PerfildeUsuario\Grupos;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EstudiantesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_PerfildeUsuario.estudiantes.index')->only('index');
        $this->middleware('can:Modulo_PerfildeUsuario.estudiantes.create')->only('create', 'store');
        $this->middleware('can:Modulo_PerfildeUsuario.estudiantes.edit')->only('edit', 'update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byGrupos($id)
    {
        return DB::table('grupos')
            ->select('grupos.id', 'grupos.name')
            ->where('grupos.anno', $id)
            ->get();
    }

    public function index()
    {

        session()->put('anno', User::find(auth()->id())->anno);

        $users = DB::table('users')
            ->join('estudiantes', 'users.id', '=', 'estudiantes.user_id')
            ->select('users.*')
            ->get();
        $estudiantes = Estudiantes::all();

        $grupos = Grupos::all();

        return view('Modulo_PerfildeUsuario.estudiantes.index', compact('estudiantes', 'users', 'grupos'));
    }

    // public function listar_estudiantes()
    // {
    //     $estudiantes=DB::table('estudiantes')
    //     ->join('grupos','grupos.id','=','estudiantes.grupos_id')
    //     ->join('users','users.id','=','estudiantes.user_id')
    //     ->select('estudiantes.*','grupos.name as grupos','users.primer_nombre as nombreuno','user.segundo_nombre as nombredos','user.primer_apellido as apellidouno','user.segundo_apellido as apellidodos')
    //     ->get();

    //     return datatables()->of($estudiantes)
    //     ->addColumn('action', function ($estudiantes) {
    //     $acciones ="";
    //     if($estudiantes->is_enabled == 1){
    //        $acciones = '<a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" href="estudiantes/estado/'.$estudiantes->id.'/0 "><i class="fa fa-user-times"></i></a>';
    //     }else if($estudiantes->is_enabled == 0){
    //        $acciones = '<a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" href="estudiantes/estado/'.$estudiantes->id.'/1 "><i class="fa fa-user-check"></i></a>';
    //     }

    //        return $acciones. ' <a class="btn btn-warning  btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" href="estudiantes/'.$estudiantes->id.'"><i class="fa fa-eye"></i></a>';
    //     })
    //     ->editColumn('is_enabled', function($estudiantes){

    //     return $estudiantes->is_enabled == 1?"Activo":"Inactivo";
    //     })
    //     ->rawColumns(['action'])
    //     ->toJson();

    // }


    // public function cambiar_estado($id, $is_enabled){

    //     $estudiantes = Estudiantes::findOrFail($id);

    //     $estudiantes->update(["is_enabled"=>$is_enabled]);

    //     return redirect()->route('estudiantes.index')->with('info', 'cambiar-estado-estudiantes');

    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $anno  = session()->get('anno') ;
        //$grupos = Grupos::all()->where('anno', $anno);
        $grupos = Grupos::where('anno', $anno)->pluck('name', 'id')->toArray();
        $tipo_estudiante = [
            'Becado Nacional' => 'Becado Nacional',
            'Extranjero Financiado por un Gobierno' => 'Extranjero Financiado por un Gobierno',
            'Becado Extranjero Autofinanciado' => 'Becado Extranjero Autofinanciado'
        ];

        $users = DB::select('SELECT users.id, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_estudiante
        FROM users WHERE users.id NOT IN (SELECT users.id FROM users
        INNER JOIN estudiantes ON users.id = estudiantes.user_id) AND users.tipo_de_usuario = "Estudiante" AND users.anno = ' . $anno . '
        ');


        //$users = User::all();
        return view('Modulo_PerfildeUsuario.estudiantes.create', compact('grupos', 'tipo_estudiante', 'users','anno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $rules = [
        //     'user_id' => 'required|unique:estudiantes',
        //     'grupos_id' => 'required',
        //     'periodo_lectivo' => 'required',
        //     'tipo_curso' => 'required',
        //     'plan_estudio' => 'required',
        //     'organizacion_pe' => 'required',
        //     'via_ingreso' => 'required',
        //     'situacion_escolar' => 'required',
        //     'tipo_estudiante' => 'required',
        //     'direccion_completa' => 'required',
        //     'nombre_madre' => 'required',
        //     'cohorte_estudiantil' => 'required',
        // ];
        // $messages = [
        //     'user_id.required' => 'Campo Requerido',
        //     'user_id.unique' => 'Campo Unico',
        //     'grupos_id.required' => 'Campo Requerido',
        //     'periodo_lectivo.required' => 'Campo Requerido',
        //     'tipo_curso.required' => 'Campo Requerido',
        //     'plan_estudio.required' => 'Campo Requerido',
        //     'organizacion_pe.required' => 'Campo Requerido',
        //     'via_ingreso.required' => 'Campo Requerido',
        //     'situacion_escolar.required' => 'Campo Requerido',
        //     'tipo_estudiante.required' => 'Campo Requerido',
        //     'direccion_completa.required' => 'Campo Requerido',
        //     'nombre_madre.required' => 'Campo Requerido',
        //     'cohorte_estudiantil.required' => 'Campo Requerido',


        // ];
        // $this->validate($request, $rules, $messages);

        $estudiantes = Estudiantes::create($request->all());

        return redirect()->route('estudiantes.index', compact('estudiantes'))->with('info', 'adicionar-datos-estudiante');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $estudiantes = Estudiantes::findOrFail($id);

        $anno  = session()->get('anno') ;
        //$grupos = Grupos::all()->where('anno', $anno);
        $grupos = Grupos::where('anno', $anno)->pluck('name', 'id')->toArray();

        $tipo_estudiante = [
            'Becado Nacional' => 'Becado Nacional',
            'Extranjero Financiado por un Gobierno' => 'Extranjero Financiado por un Gobierno',
            'Becado Extranjero Autofinanciado' => 'Becado Extranjero Autofinanciado'
        ];
        $sexo = [
            'Masculino' => 'Masculino',
            'Femenino' => 'Femenino'
        ];

        return view('Modulo_PerfildeUsuario.estudiantes.edit', compact('estudiantes', 'grupos', 'tipo_estudiante', 'sexo'));
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
        $estudiantes = Estudiantes::findOrFail($id);

        // $rules = [
        //     'grupos_id' => 'required',
        //     'anno' => 'required',
        //     'periodo_lectivo' => 'required',
        //     'tipo_curso' => 'required',
        //     'plan_estudio' => 'required',
        //     'organizacion_pe' => 'required',
        //     'via_ingreso' => 'required',
        //     'situacion_escolar' => 'required',
        //     'tipo_estudiante' => 'required',
        //     'direccion_completa' => 'required',
        //     'nombre_madre' => 'required',
        //     'cohorte_estudiantil' => 'required',
        // ];
        // $messages = [
        //     'grupos_id.required' => 'Campo Requerido',
        //     'anno.required' => 'Campo Requerido',
        //     'periodo_lectivo.required' => 'Campo Requerido',
        //     'tipo_curso.required' => 'Campo Requerido',
        //     'plan_estudio.required' => 'Campo Requerido',
        //     'organizacion_pe.required' => 'Campo Requerido',
        //     'via_ingreso.required' => 'Campo Requerido',
        //     'situacion_escolar.required' => 'Campo Requerido',
        //     'tipo_estudiante.required' => 'Campo Requerido',
        //     'direccion_completa.required' => 'Campo Requerido',
        //     'nombre_madre.required' => 'Campo Requerido',
        //     'cohorte_estudiantil.required' => 'Campo Requerido',
        // ];

        // $this->validate($request, $rules, $messages);

        $estudiantes->update($request->all());

        return redirect()->route('usuarios.show', $estudiantes->users->id)->with('info', 'modificar-datos-estudiantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        //$est = Estudiantes::findOrFail($id);

        // $est->delete();
    }
    // public function importar_estudiantes(Request $request)
    // {

    //     $file = $request->file('import_file');

    //     Excel::import(new EstudiantesImport, $file);

    //     return redirect()->route('estudiantes.index')->with('info', 'importar-estudiante');
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $users = User::all();

    //     $estudiantes = Estudiantes::findOrFail($id);


    //     return view('Modulo_PerfildeUsuario.usuarios.show', compact('users','estudiantes'));
    // }

}