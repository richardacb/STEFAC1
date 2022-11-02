<?php

namespace App\Http\Controllers\Modulo_PerfildeUsuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_PerfildeUsuario\Estudiantes;
use App\Models\Modulo_PerfildeUsuario\Grupos;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Exports\EstudiantesExport;
use Spatie\Permission\Models\Role;

class EstudiantesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_PerfildeUsuario.estudiantes.index')->only('index');
        $this->middleware('can:Modulo_PerfildeUsuario.estudiantes.create')->only('create', 'store');
        $this->middleware('can:Modulo_PerfildeUsuario.estudiantes.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_PerfildeUsuario.estudiantes.destroy')->only('destroy');
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

        $anno  = session()->get('anno');
        $users = DB::table('users')
            ->join('estudiantes', 'users.id', '=', 'estudiantes.user_id')
            ->select('users.*', 'estudiantes.*')
            ->get();
        $anno  = session()->get('anno');

        if (User::find(auth()->id())->hasRole('Vicedecana')) {
            $estudiantes = DB::select('SELECT users.id, users.anno as anno, e.e_id, e.name as grupo,CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_estudiante

            FROM users  INNER JOIN  (SELECT e.user_id, e.id as e_id, g.name  FROM estudiantes as e INNER JOIN
            grupos as g ON e.grupos_id = g.id) as e ON users.id = e.user_id
            ');
        } else {
            $estudiantes = DB::select('SELECT users.id, users.anno as anno, e.e_id, e.name as grupo,CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_estudiante
            FROM users  INNER JOIN  (SELECT e.user_id, e.id as e_id, g.name  FROM estudiantes as e INNER JOIN
            grupos as g ON e.grupos_id = g.id) as e ON users.id = e.user_id
            WHERE users.anno = ' . $anno . '
            ');

        
        // $estudiantes = Estudiantes::all();
        $grupos = Grupos::all();
            // $estudiantes = Estudiantes::all();
            $grupos = Grupos::all();

        }

        return view('Modulo_PerfildeUsuario.estudiantes.index', compact('estudiantes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $anno  = session()->get('anno');

        $grupos = Grupos::where('anno', $anno)->pluck('name', 'id')->toArray();

        $tipo_estudiante = [
            'Becado Nacional' => 'Becado Nacional',
            'Extranjero Financiado por un Gobierno' => 'Extranjero Financiado por un Gobierno',
            'Becado Extranjero Autofinanciado' => 'Becado Extranjero Autofinanciado'
        ];
        if (User::find(auth()->id())->hasRole('Vicedecana')) {
            $grupos = Grupos::pluck('name', 'id')->toArray();
            $users = DB::select('SELECT users.id,users.anno, users.primer_nombre,users.segundo_nombre,users.primer_apellido,users.segundo_apellido
        FROM users WHERE users.id NOT IN (SELECT users.id FROM users
        INNER JOIN estudiantes ON users.id = estudiantes.user_id) AND users.tipo_de_usuario = "Estudiante"
        ');
        } else {
            $grupos = Grupos::where('anno', $anno)->pluck('name', 'id')->toArray();
            $users = DB::select('SELECT users.id, users.primer_nombre,users.segundo_nombre,users.primer_apellido,users.segundo_apellido
        FROM users WHERE users.id NOT IN (SELECT users.id FROM users
        INNER JOIN estudiantes ON users.id = estudiantes.user_id) AND users.tipo_de_usuario = "Estudiante"  AND users.anno = ' . $anno . '
        ');
        }


        //$users = User::all();
        return view('Modulo_PerfildeUsuario.estudiantes.create', compact('grupos', 'tipo_estudiante', 'users', 'anno'));
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
            'grupos_id' => 'required',
            'periodo_lectivo' => 'required',
            'tipo_curso' => 'required',
            'plan_estudio' => 'required',
            'organizacion_pe' => 'required',
            'via_ingreso' => 'required',
            'situacion_escolar' => 'required',
            'tipo_estudiante' => 'required',
            'direccion_completa' => 'required',
            'nombre_madre' => 'required',
            'cohorte_estudiantil' => 'required',
        ];
        $messages = [
            'user_id.required' => 'Campo Requerido',
            'grupos_id.required' => 'Campo Requerido',
            'periodo_lectivo.required' => 'Campo Requerido',
            'tipo_curso.required' => 'Campo Requerido',
            'plan_estudio.required' => 'Campo Requerido',
            'organizacion_pe.required' => 'Campo Requerido',
            'via_ingreso.required' => 'Campo Requerido',
            'situacion_escolar.required' => 'Campo Requerido',
            'tipo_estudiante.required' => 'Campo Requerido',
            'direccion_completa.required' => 'Campo Requerido',
            'nombre_madre.required' => 'Campo Requerido',
            'cohorte_estudiantil.required' => 'Campo Requerido',


        ];
        $this->validate($request, $rules, $messages);

        $estudiantes = Estudiantes::create($request->all());

        return redirect()->route('estudiantes.index')->with('info', 'adicionar-datos-estudiante');
    }

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

        $select_anno = DB::select('SELECT users.anno FROM users WHERE users.id = (SELECT estudiantes.user_id FROM estudiantes WHERE estudiantes.id =' . $id . ')');

        if ($anno === $select_anno[0]->anno || (User::find(auth()->id())->hasRole('Vicedecana'))) {

            $estudiantes = Estudiantes::findOrFail($id);

            $grupos = Grupos::where('anno', $anno)->pluck('name', 'id')->toArray();

            $anno  = session()->get('anno');
            if (User::find(auth()->id())->hasRole('Vicedecana')) {
                $grupos = Grupos::pluck('name', 'id')->toArray();
            } else {
                $grupos = Grupos::where('anno', $anno)->pluck('name', 'id')->toArray();
            }

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
        $estudiantes = Estudiantes::findOrFail($id);

        $rules = [
            'grupos_id' => 'required',
            'periodo_lectivo' => 'required',
            'tipo_curso' => 'required',
            'plan_estudio' => 'required',
            'organizacion_pe' => 'required',
            'via_ingreso' => 'required',
            'situacion_escolar' => 'required',
            'tipo_estudiante' => 'required',
            'direccion_completa' => 'required',
            'nombre_madre' => 'required',
            'cohorte_estudiantil' => 'required',
        ];
        $messages = [
            'grupos_id.required' => 'Campo Requerido',
            'periodo_lectivo.required' => 'Campo Requerido',
            'tipo_curso.required' => 'Campo Requerido',
            'plan_estudio.required' => 'Campo Requerido',
            'organizacion_pe.required' => 'Campo Requerido',
            'via_ingreso.required' => 'Campo Requerido',
            'situacion_escolar.required' => 'Campo Requerido',
            'tipo_estudiante.required' => 'Campo Requerido',
            'direccion_completa.required' => 'Campo Requerido',
            'nombre_madre.required' => 'Campo Requerido',
            'cohorte_estudiantil.required' => 'Campo Requerido',


        ];
        $this->validate($request, $rules, $messages);

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
        $estudiantes = Estudiantes::findOrFail($id);

        $estudiantes->delete();

        return redirect()->route('estudiantes.index')->with('info', 'eliminar-datos-estudiantes');
    }

    public function exportExcelEstudiantes()
    {
        return Excel::download(new EstudiantesExport, 'Datos de estudiantes.xlsx');
    }
}