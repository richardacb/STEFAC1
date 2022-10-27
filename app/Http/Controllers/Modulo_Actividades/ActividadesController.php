<?php

namespace App\Http\Controllers\Modulo_Actividades;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Modulo_Actividades\Actividades;
use Illuminate\Support\Facades\DB;
use App\Imports\ActividadesImport;
use Spatie\Permission\Models\Role;

class ActividadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_Actividades.actividades.index')->only('index');
        $this->middleware('can:Modulo_Actividades.actividades.create')->only('create', 'store');
        $this->middleware('can:Modulo_Actividades.actividades.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_Actividades.actividades.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_act_1 = count(DB::table("actividades")->where("tipo_actividad","Político Ideológico")->get());
        $count_act_2 = count(DB::table("actividades")->where("tipo_actividad","Académico")->get());
        $count_act_3 = count(DB::table("actividades")->where("tipo_actividad","Investigativa")->get());
        $count_act_4 = count(DB::table("actividades")->where("tipo_actividad","Extensión Universitaria")->get());




        $actividades= Actividades::all();
        $actividades=Actividades::orderBy('año','ASC')->get();
        return view('Modulo_Actividades.actividades.index', compact('actividades','count_act_1','count_act_2','count_act_3','count_act_4'));
    }

    public function listar_actividades(){
       $actividades=DB::table('actividades')
       ->select('*')
       ->get();
       return datatables()->of($actividades)
       ->addColumn('action', function ($actividades) {
       $acciones ="";
       if($actividades->is_enabled == 1){
          $acciones = '<a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" href="actividades/tipo_actividad/'.$actividades->id.'/0 "><i class="fa fa-user-times"></i></a>';
       }else if($actividades->is_enabled == 0){
          $acciones = '<a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" href="actividades/tipo_actividad/'.$actividades->id.'/1 "><i class="fa fa-user-check"></i></a>';
       }

       return $acciones. ' <a class="btn btn-warning  btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" href="actividades/'.$actividades->id.'"><i class="fa fa-eye"></i></a>';
    })
    ->editColumn('is_enabled', function($actividades){
        return $actividades->is_enabled == 1?"Activo":"Inactivo";
        })
        ->rawColumns(['action'])
        ->toJson();



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::all();
        return view('Modulo_Actividades.actividades.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
        'nombre' => 'required',
        'año' => 'required|numeric',
        'tipo_actividad' =>'required',
         ];
         $messages = [
            'nombre.required' =>'Debe insertar el nombre de la actividad',
            'año' =>'El año es obligatorio',
            'tipo_actividad'=>'Debe seleccionar el tipo de actividad',
         ];
         $this->validate( $request, $rules, $messages);

         $role = Role::all();
         $actividades= Actividades::create($request->all());

         return redirect()->route('actividades.index',compact('actividades', 'role'))->with('info','adicionar-actividad');
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
        $actividades = Actividades::findOrFail($id);

        return view('Modulo_Actividades.actividades.show', compact('actividades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::all();
        $actividades = Actividades::findOrFail($id);
        return view('Modulo_Actividades.actividades.edit', compact('actividades', 'role'));
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

        $actividades = Actividades::findOrFail($id);
        $rules = [
            'nombre' => 'required',
            'año' => 'required|numeric',
            'tipo_actividad' =>'required',
             ];
             $messages = [
                'nombre.required' =>'Debe insertar el nombre de la actividad',
                'año.required' =>'El año es obligatorio',
                'tipo_actividad'=>'Debe seleccionar el tipo de actividad',
             ];

             $this->validate( $request, $rules, $messages);

             $role = Role::all();
             $actividades->update($request->all());

             return redirect()->route('actividades.index', compact('actividades', 'role'))->with('info', 'modificar-actividad');

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

        $role = Role::all();
        $actividades = Actividades::findOrFail($id);

        $actividades->delete();

        return redirect()->route('actividades.index', compact('role'))->with('info', 'eliminar-actividad');
    }
}
