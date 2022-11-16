<?php

namespace App\Http\Controllers\Modulo_PerfildeUsuario;

use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Modulo_PerfildeUsuario\Estudiantes;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Imports\UsuariosImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class UsuariosController extends Controller
{

    use RegistersUsers;
    public function __construct()
    {
        $this->middleware('can:Modulo_PerfildeUsuario.usuarios.index')->only('index');
        $this->middleware('can:Modulo_PerfildeUsuario.usuarios.create')->only('create');
        $this->middleware('can:Modulo_PerfildeUsuario.usuarios.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_PerfildeUsuario.usuarios.show')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('Modulo_PerfildeUsuario.usuarios.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();

        return view('Modulo_PerfildeUsuario.usuarios.create', compact('users'));
    }

    public function store(Request $request)
    {
        $users = new User();
        $users->ci = $request->get('ci');
        $users->primer_nombre = $request->get('primer_nombre');
        $users->segundo_nombre = $request->get('segundo_nombre') == NULL ? " " : $request->get('segundo_nombre');
        $users->primer_apellido = $request->get('primer_apellido');
        $users->segundo_apellido = $request->get('segundo_apellido');
        $users->tipo_de_usuario = $request->get('tipo_de_usuario');
        $users->username = $request->get('username');
        $users->password = bcrypt($request->get('password'));
        $users->email = $request->get('email');
        $users->sexo = $request->get('sexo');
        $users->anno = $request->get('anno');
        $users->municipio = $request->get('municipio');
        $users->provincia = $request->get('provincia');
        $users->color_piel = $request->get('color_piel');
        $users->telefono_casa = $request->get('telefono_casa');
        $users->telefono_uci = $request->get('telefono_uci');
        $users->celular = $request->get('celular');
        $users->solapin = $request->get('solapin');


        $users->save();
        $users->roles()->attach(Role::where('name', 'Usuario')->first());


        return redirect()->route('usuarios.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $roles = Role::all();
        $users = User::findOrFail($id);
        return view('Modulo_PerfildeUsuario.usuarios.edit', compact('users', 'roles'));
    }

    public function editar($id)

    {
        $users = User::findOrFail($id);
        //echo $users->password;
        return view('Modulo_PerfildeUsuario.usuarios.editar', compact('users'));
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

        $users = User::findOrFail($id);
        $users->roles()->sync($request->roles);

        return redirect()->route('usuarios.index')->with('info', 'asignar-rol-usuario');
    }

    public function actualizar(Request $request, $id)
    {


        $users = User::findOrFail($id);

        $users->ci = $request->get('ci');
        $users->primer_nombre = $request->get('primer_nombre');
        $users->segundo_nombre = $request->get('segundo_nombre') == NULL ? " " : $request->get('segundo_nombre');
        $users->primer_apellido = $request->get('primer_apellido');
        $users->segundo_apellido = $request->get('segundo_apellido');
        $users->tipo_de_usuario = $request->get('tipo_de_usuario');
        $users->username = $request->get('username');
        $users->email = $request->get('email');
        $users->sexo = $request->get('sexo');
        $users->anno = $request->get('anno');
        $users->municipio = $request->get('municipio');
        $users->provincia = $request->get('provincia');
        $users->color_piel = $request->get('color_piel');
        $users->telefono_casa = $request->get('telefono_casa');
        $users->telefono_uci = $request->get('telefono_uci');
        $users->celular = $request->get('celular');
        $users->solapin = $request->get('solapin');

        $users->update($request->all());

        return redirect()->route('usuarios.index', compact('users'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        session()->put('anno', User::find(auth()->id())->anno);
        $anno = session()->get('anno');
        // // $select_anno = DB::select('SELECT users.anno FROM users WHERE users.id = ' . $id . '');
        // $select_anno_dp = DB::select('SELECT users.anno FROM users INNER JOIN diagnosticopreventivo ON users.id = diagnosticopreventivo.user_id  WHERE users.id =  ' . $id . '');
        // $select_anno_e = DB::select('SELECT users.anno FROM users INNER JOIN estudiantes ON users.id = estudiantes.user_id  WHERE users.id = ' . $id . '');
        // $select_anno_p = DB::select('SELECT users.anno FROM users INNER JOIN profesores ON users.id = profesores.user_id  WHERE users.id = ' . $id . '');

        if (DB::select('SELECT users.anno FROM users INNER JOIN diagnosticopreventivo ON users.id = diagnosticopreventivo.user_id  WHERE users.id =  ' . $id . '')) {
            $select_anno = DB::select('SELECT users.anno FROM users INNER JOIN diagnosticopreventivo ON users.id = diagnosticopreventivo.user_id  WHERE users.id =  ' . $id . '');
        }
        if (DB::select('SELECT users.anno FROM users INNER JOIN estudiantes ON users.id = estudiantes.user_id  WHERE users.id = ' . $id . '')) {
            $select_anno = DB::select('SELECT users.anno FROM users INNER JOIN estudiantes ON users.id = estudiantes.user_id  WHERE users.id = ' . $id . '');
        }

        if (DB::select('SELECT users.anno FROM users INNER JOIN profesores ON users.id = profesores.user_id  WHERE users.id = ' . $id . '')) {
            $select_anno = DB::select('SELECT users.anno FROM users INNER JOIN profesores ON users.id = profesores.user_id  WHERE users.id = ' . $id . '');
        }


        if (($id == auth()->id()) ||
            ($anno == $select_anno[0]->anno  && (User::find(auth()->id())->hasRole('ProfesorJefeAño') || User::find(auth()->id())->hasRole('ProfesorGuia'))) ||
            (User::find(auth()->id())->hasRole('Administrador')) ||
            (User::find(auth()->id())->hasRole('Vicedecana'))
        ) {

            $users = User::findOrFail($id);
            $cant_opt_finalizadas = DB::select('SELECT COUNT(opt_ests.id_est) as cant_opt
                                            FROM opt_ests
                                            WHERE opt_ests.id_est = ' . $id . ' AND opt_ests.estado = 1')[0];

            $cant_opt = $cant_opt_finalizadas->cant_opt;
            return view('Modulo_PerfildeUsuario.usuarios.show', compact('users', 'cant_opt'));
        } else {
            abort(401);
        }

    }

    public function importar_usuarios(Request $request)
    {

        $file = $request->file('import_file');

        Excel::import(new UsuariosImport, $file);

        return redirect()->route('usuarios.index')->with('info', 'importar-usuarios');
    }

    // public function createPDF(){
    //     //Recuperar todos los productos de la db
    //     $users = User::all();
    //     view()->share('users', $users);
    //     $pdf = PDF::loadView('Modulo_PerfildeUsuario.usuarios.index', $users);
    //     return $pdf->download('archivo-pdf.pdf');
    // }
    //     public function createPDF()
    // {
    //     $data = [
    //         'titulo' => 'Styde.net'
    //     ];

    //     $users = User::all();
    //     $pdf = \PDF::loadView('Modulo_PerfildeUsuario.usuarios.index', compact('users'));
    //     return $pdf->download('ejemplo.pdf');

    // }
}