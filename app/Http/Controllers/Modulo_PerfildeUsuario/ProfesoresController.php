<?php

namespace App\Http\Controllers\Modulo_PerfildeUsuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_PerfildeUsuario\Profesores;
use App\Models\Modulo_PerfildeUsuario\Grupos;
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
        $this->middleware('can:Modulo_PerfildeUsuario.profesores.destroy')->only('destroy');
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
        $anno = session()->get('anno');
        if (User::find(auth()->id())->hasRole('Vicedecana')) {
            $profesores = DB::select('SELECT users.id, users.anno as anno, p.p_id, p.name as grupo, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_profesor
        FROM users  INNER JOIN  (SELECT p.user_id ,  g.name ,p.id as p_id FROM profesores as p LEFT JOIN
        grupos as g ON p.grupos_id = g.id) as p ON users.id = p.user_id
        ');
        } else {
            $profesores = DB::select('SELECT users.id, users.anno as anno, p.p_id, p.name as grupo, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_profesor
        FROM users  INNER JOIN  (SELECT p.user_id ,  g.name ,p.id as p_id FROM profesores as p LEFT JOIN
        grupos as g ON p.grupos_id = g.id) as p ON users.id = p.user_id
        WHERE users.anno = ' . $anno . '
        ');
        }

        return view('Modulo_PerfildeUsuario.profesores.index', compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $anno = session()->get('anno');
        if (User::find(auth()->id())->hasRole('Vicedecana')) {
            $users = DB::select('SELECT users.id,users.anno, users.primer_nombre,users.segundo_nombre,users.primer_apellido,users.segundo_apellido
        FROM users WHERE users.id NOT IN (SELECT users.id FROM users
        INNER JOIN profesores ON users.id = profesores.user_id) AND users.tipo_de_usuario = "Profesor"
        ');
            $grupos = DB::select('SELECT grupos.name as grupo, grupos.id
        FROM grupos WHERE grupos.id NOT IN (SELECT grupos.id FROM grupos
        INNER JOIN profesores ON grupos.id = profesores.grupos_id)
        ');
            $asignaturas = Asignaturas::pluck('nombre', 'id')->toArray();
        } else {
            $users = DB::select('SELECT users.id, users.primer_nombre,users.segundo_nombre,users.primer_apellido,users.segundo_apellido
        FROM users WHERE users.id NOT IN (SELECT users.id FROM users
        INNER JOIN profesores ON users.id = profesores.user_id) AND users.tipo_de_usuario = "Profesor" AND users.anno = ' . session()->get('anno') . '
        ');
            $grupos = DB::select('SELECT grupos.name as grupo, grupos.id
        FROM grupos WHERE grupos.id NOT IN (SELECT grupos.id FROM grupos
        INNER JOIN profesores ON grupos.id = profesores.grupos_id) AND grupos.anno = ' . session()->get('anno') . '
        ');
            $asignaturas = Asignaturas::where('anno', $anno)->pluck('nombre', 'id')->toArray();
        }
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
            'user_id' => 'required|not_in:0',
            'tipo_de_clases' => 'required',
            'periodo_lectivo' => 'required',
            'asignaturas_id' => 'required',
        ];

        $messages = [
            'user_id.required' => 'Campo Requerido',
            'tipo_de_clases.required' => 'Campo Requerido',
            'periodo_lectivo.required' => 'Campo Requerido',
            'asignaturas_id.required' => 'Campo Requerido',

        ];
        $this->validate($request, $rules, $messages);

        $profesores = Profesores::create($request->all());

        return redirect()->route('profesores.index')->with('info', 'adicionar-profesor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        session()->put('anno', User::find(auth()->id())->anno);
        $anno = session()->get('anno');

        $select_anno = DB::select('SELECT users.anno FROM users WHERE users.id = (SELECT profesores.user_id FROM profesores WHERE profesores.id = ' . $id . ')');

        if ($anno === $select_anno[0]->anno || (User::find(auth()->id())->hasRole('Vicedecana'))) {

            $profesores = Profesores::findOrFail($id);

            $anno  = session()->get('anno');
            if (User::find(auth()->id())->hasRole('Vicedecana')) {
                $grupos = DB::select('SELECT grupos.name as grupo, grupos.id
        FROM grupos WHERE grupos.id NOT IN (SELECT grupos.id FROM grupos
        INNER JOIN profesores ON grupos.id = profesores.grupos_id)
        ');
                $asignaturas = Asignaturas::pluck('nombre', 'id')->toArray();
            } else {
                $grupos = DB::select('SELECT grupos.name as grupo, grupos.id
            FROM grupos WHERE grupos.id NOT IN (SELECT grupos.id FROM grupos
            INNER JOIN profesores ON grupos.id = profesores.grupos_id) AND grupos.anno = ' . session()->get('anno') . '
            ');
                $asignaturas = Asignaturas::where('anno', $anno)->pluck('nombre', 'id')->toArray();
            }

            return view('Modulo_PerfildeUsuario.profesores.edit', compact('profesores', 'grupos', 'asignaturas'));
        } else {
            abort(401);
        }
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
            'tipo_de_clases' => 'required',
            'periodo_lectivo' => 'required',
            'asignaturas_id' => 'required',
        ];

        $messages = [
            'tipo_de_clases.required' => 'Campo Requerido',
            'periodo_lectivo.required' => 'Campo Requerido',
            'asignaturas_id.required' => 'Campo Requerido',
        ];
        $this->validate($request, $rules, $messages);

        $profesores->update($request->all());

        return redirect()->route('profesores.index')->with('info', 'modificar-profesor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesores = Profesores::findOrFail($id);

        $profesores->delete();

        return redirect()->route('profesores.index')->with('info', 'eliminar-datos-profesores');
    }
    // public function exportExcel()
    // {
    //     return Excel::download(new BalancedecargaExport, 'Balance de Carga.xlsx');
    // }

}
