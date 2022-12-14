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

class UsuariosController extends Controller
{

    use RegistersUsers;
    public function __construct()
    {
        $this->middleware('can:Modulo_PerfildeUsuario.usuarios.index')->only('index');
        $this->middleware('can:Modulo_PerfildeUsuario.usuarios.edit')->only('edit', 'update');
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
        $users->segundo_nombre = $request->get('segundo_nombre') == NULL ? " ": $request->get('segundo_nombre');
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

        return redirect()->route('usuarios.edit', $users)->with('info', 'asignar-rol-usuario');
    }

    public function actualizar(Request $request, $id)
    {


        $users = User::findOrFail($id);

        $users->ci = $request->get('ci');
        $users->primer_nombre = $request->get('primer_nombre');
        $users->segundo_nombre = $request->get('segundo_nombre');
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
        $users = User::findOrFail($id);
        $cant_opt_finalizadas = DB::select('SELECT COUNT(opt_ests.id_est) as cant_opt
                                            FROM opt_ests
                                            WHERE opt_ests.id_est = ' . $id . ' AND opt_ests.estado = 1')[0];

        $cant_opt = $cant_opt_finalizadas->cant_opt;
        return view('Modulo_PerfildeUsuario.usuarios.show', compact('users','cant_opt'));
    }
}