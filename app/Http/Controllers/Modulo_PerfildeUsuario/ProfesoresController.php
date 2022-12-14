<?php

namespace App\Http\Controllers\Modulo_PerfildeUsuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_PerfildeUsuario\Profesores;
use App\Models\Modulo_PerfildeUsuario\Grupos;
//use App\Models\Modulo_PerfildeUsuario\GrupoProfesor;
use App\Models\Modulo_Horario\Asignaturas;
use App\Models\Modulo_Horario\Tipo_de_Clase;
use Illuminate\Support\Facades\DB;
use App\Models\User;
//use App\Imports\ProfesoresImport;
use Maatwebsite\Excel\Facades\Excel;

class ProfesoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_PerfildeUsuario.profesores.index')->only('index');
        $this->middleware('can:Modulo_PerfildeUsuario.profesores.create')->only('create', 'store');
        $this->middleware('can:Modulo_PerfildeUsuario.profesores.edit')->only('edit', 'update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byAsignaturas($id)
    {

        return DB::table('users')
            ->join('profesores', 'users.id', '=', 'profesores.user_id')
            ->select('users.id', 'users.primer_nombre', 'users.segundo_nombre', 'users.primer_apellido', 'users.segundo_apellido')
            ->where('profesores.asignaturas_id', $id)
            ->get();
    }
    public function byGrupos($id)
    {
        return DB::table('grupos')
            ->select('grupos.name', 'grupos.id')
            ->where('grupos.anno', $id)
            ->get();
    }
    public function index()
    {
        session()->put('anno', User::find(auth()->id())->anno);

        $users = DB::table('users')
            ->join('profesores', 'users.id', '=', 'profesores.user_id')
            ->select('users.*')
            ->get();

        $profesores = Profesores::all();
        $asignaturas = Asignaturas::all();
        $grupos = Grupos::all();

        return view('Modulo_PerfildeUsuario.profesores.index', compact('users', 'profesores', 'grupos', 'asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $anno = session()->get('anno');


        $users = DB::select('SELECT users.id, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_profesor
        FROM users WHERE users.id NOT IN (SELECT users.id FROM users
        INNER JOIN profesores ON users.id = profesores.user_id) AND users.tipo_de_usuario = "Profesor" AND users.anno = ' . session()->get('anno') . '
        ');
        $grupos = Grupos::all()->where('anno',session()->get('anno'));
        $asignaturas = Asignaturas::all()->where('anno',session()->get('anno'));
        // $anno = [
        //     '1' => 'Primer A??o',
        //     '2' => 'Segundo A??o',
        //     '3' => 'Tercero A??o',
        //     '4' => 'Cuarto A??o',
        //     '5' => 'Quinto A??o'
        // ];
        return view('Modulo_PerfildeUsuario.profesores.create', compact('users', 'grupos', 'asignaturas'));
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
            'user_id' => 'required|unique:profesores',
            'grupos_id' => 'required',
            // 'anno' => 'required',
            'tipo_de_clases' => 'required',
            'asignaturas_id' => 'required',
        ];

        $messages = [
            'user_id.required' => 'Campo Requerido',
            'user_id.unique' => 'Campo Unico',
            'grupos_id.required' => 'Campo Requerido',
            // 'anno.required' => 'Campo Requerido',
            'tipo_de_clases.required' => 'Campo Requerido',
            'asignaturas_id.required' => 'Campo Requerido',

        ];
        $this->validate($request, $rules, $messages);

        $profesores = Profesores::create($request->all());

        return redirect()->route('profesores.index', compact('profesores'))->with('info', 'adicionar-profesor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::all();

        $profesores = Profesores::findOrFail($id);


        return view('Modulo_PerfildeUsuario.usuarios.show', compact('users', 'profesores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesores = Profesores::findOrFail($id);
        $grupos = Grupos::pluck('name', 'id')->toArray();
        $asignaturas = Asignaturas::pluck('nombre', 'id')->toArray();
        $anno = [
            '1' => 'Primer A??o',
            '2' => 'Segundo A??o',
            '3' => 'Tercero A??o',
            '4' => 'Cuarto A??o',
            '5' => 'Quinto A??o'
        ];
        return view('Modulo_PerfildeUsuario.profesores.edit', compact('profesores', 'grupos', 'anno', 'asignaturas'));
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
        $profesores = Profesores::findOrFail($id);

        $rules = [
            'grupos_id' => 'required',
            'anno' => 'required',
            'tipo_de_clases' => 'required',
            'asignaturas_id' => 'required',
        ];

        $messages = [
            'grupos_id.required' => 'Campo Requerido',
            'anno.required' => 'Campo Requerido',
            'tipo_de_clases.required' => 'Campo Requerido',
            'asignaturas_id.required' => 'Campo Requerido',
        ];
        $this->validate($request, $rules, $messages);

        $profesores->update($request->all());

        return redirect()->route('profesores.index', compact('profesores'))->with('info', 'modificar-profesor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    // public function importar_profesores(Request $request)
    // {

    //     $file = $request->file('import_file');

    //     Excel::import(new ProfesoresImport, $file);

    //     return redirect()->route('profesores.index')->with('info', 'importar-profesor');
    // }
}