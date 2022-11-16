<?php

namespace App\Http\Controllers\Modulo_Optativas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_Optativas\Optativa;
use App\Models\Modulo_PerfildeUsuario\Profesores;
use App\Models\Modulo_Optativas\OptEstado;
use Illuminate\Routing\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class OptativaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Modulo_Optativas.optativa.index')->only('index');
        $this->middleware('can:Modulo_Optativas.optativa.create')->only('create', 'store');
        $this->middleware('can:Modulo_Optativas.optativa.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_Optativas.optativa.show')->only('show');
        $this->middleware('can:Modulo_Optativas.optativa.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->put('anno', User::find(auth()->id())->anno);
        $anno = session()->get('anno');
        if (User::find(auth()->id())->hasRole('Vicedecana')) {
            $optativas = DB::select('SELECT o.id, o.nombre, o.descripcion, o.capacidad, o.anno_academico, o.semestre, o.estado,
        CONCAT(pp.primer_nombre," ",pp.segundo_nombre," ",pp.primer_apellido," ",pp.segundo_apellido) as prof_principal,
        CONCAT(pa.primer_nombre," ",pa.segundo_nombre," ",pa.primer_apellido," ",pa.segundo_apellido) as prof_auxiliar
        FROM optativas as o

        LEFT JOIN
        (SELECT users.id, users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido
        FROM users INNER JOIN profesores ON users.id = profesores.user_id) as pp ON o.prof_principal = pp.id

        LEFT JOIN
        (SELECT users.id, users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido
        FROM users INNER JOIN profesores ON users.id = profesores.user_id) as pa ON o.prof_auxiliar = pa.id
        ');
        } else {
            $optativas = DB::select('SELECT o.id, o.nombre, o.descripcion, o.capacidad, o.anno_academico, o.semestre, o.estado,
        CONCAT(pp.primer_nombre," ",pp.segundo_nombre," ",pp.primer_apellido," ",pp.segundo_apellido) as prof_principal,
        CONCAT(pa.primer_nombre," ",pa.segundo_nombre," ",pa.primer_apellido," ",pa.segundo_apellido) as prof_auxiliar
        FROM optativas as o

        LEFT JOIN
        (SELECT users.id, users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido
        FROM users INNER JOIN profesores ON users.id = profesores.user_id) as pp ON o.prof_principal = pp.id

        LEFT JOIN
        (SELECT users.id, users.primer_nombre, users.segundo_nombre, users.primer_apellido, users.segundo_apellido
        FROM users INNER JOIN profesores ON users.id = profesores.user_id) as pa ON o.prof_auxiliar = pa.id
        WHERE o.anno_academico = ' . $anno . '');
        }

        return view('Modulo_Optativas.optativa.index')->with('optativas',  $optativas);
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
            $profesores = DB::select('SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as prof_nombre
                        FROM users as u INNER JOIN (SELECT profesores.user_id
                                                FROM profesores
                                                WHERE profesores.user_id NOT IN (SELECT IFNULL(optativas.prof_auxiliar, 0)
                                                                FROM optativas
                                                                UNION
                                                                SELECT IFNULL(optativas.prof_principal, 0)
                                                                FROM optativas)) as p ON
                                                                u.id = p.user_id');
        } else {
            $profesores = DB::select('SELECT u.id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as prof_nombre
                        FROM users as u INNER JOIN (SELECT profesores.user_id
                                                FROM profesores
                                                WHERE profesores.user_id NOT IN (SELECT IFNULL(optativas.prof_auxiliar, 0)
                                                                FROM optativas
                                                                UNION
                                                                SELECT IFNULL(optativas.prof_principal, 0)
                                                                FROM optativas)) as p ON
                                                                u.id = p.user_id WHERE u.anno = ' . $anno . '');
        }


        return view('Modulo_Optativas.optativa.create', compact('anno'))
            ->with('profesores', $profesores);
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
            'nombre' => 'required',
            // 'descripcion' => 'required',
            // 'prof_principal' => 'required|not_in:0',
            // 'prof_auxiliar' => 'required|not_in:0',
            'capacidad' => 'required',
            'anno_academico' => 'required',
            'semestre' => 'required',
            'estado' => 'required|not_in:0',
        ];
        $messages = [
            'nombre.required' => 'Campo Requerido',
            // 'descripcion.required' => 'Campo Requerido',
            // 'prof_principal.required' => 'Campo Requerido',
            // 'prof_auxiliar.required' => 'Campo Requerido',
            'capacidad.required' => 'Campo Requerido',
            'anno_academico.required' => 'Campo Requerido',
            'semestre.required' => 'Campo Requerido',
            'estado.required' => 'Campo Requerido',
        ];
        $this->validate($request, $rules, $messages);

        $optativas = new Optativa();

        $optativas->nombre = $request->get('nombre');
        $optativas->descripcion = $request->get('descripcion') == NULL ? " " : $request->get('descripcion');
        $optativas->prof_principal = $request->get('prof_principal');
        $optativas->prof_auxiliar = $request->get('prof_auxiliar');
        $optativas->capacidad = $request->get('capacidad');
        $optativas->anno_academico = $request->get('anno_academico');
        $optativas->semestre = $request->get('semestre');
        $optativas->estado = $request->get('estado');

        $optativas->save();

        return redirect()->route('optativa.index')->with('info', 'adicionar-optativa');
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

        $optativa = Optativa::find($id);

        if ($anno === $optativa->anno_academico || (User::find(auth()->id())->hasRole('Vicedecana'))) {

            $usuarios_matriculados = DB::select('SELECT e.user_id as id,
        CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as nombre_est, e.name as grupo, u.anno, e.id_est_opt
        FROM users as u INNER JOIN (SELECT e.user_id, g.name, oe.id as id_est_opt
                                    FROM estudiantes as e
                                    INNER JOIN opt_ests as oe ON e.user_id = oe.id_est
                                    INNER JOIN grupos as g ON e.grupos_id = g.id
                                    WHERE oe.id_opt = ' . $id . ' ) as e
                                    ON u.id = e.user_id');

            $usuarios_no_matriculados = DB::select('SELECT e.user_id as id, CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as nombre_est, e.grupo, u.anno
                                    FROM users as u INNER JOIN (SELECT e.user_id, g.name as grupo
                                                                FROM grupos as g INNER JOIN (SELECT estudiantes.user_id, estudiantes.grupos_id
                                                                                             FROM estudiantes
                                                                                             WHERE estudiantes.user_id IN (SELECT opt_ests.id_est
                                                                                                                           FROM opt_ests
                                                                                                                           WHERE opt_ests.id_est IN (SELECT opt_ests.id_est
                                                                                                                                                     FROM opt_ests
                                                                                                                                                     GROUP BY opt_ests.id_est
                                                                                                                                                     HAVING COUNT(opt_ests.id_est) < 2) AND opt_ests.id_opt <> ' . $id . ')
                                                                                             UNION
                                                                                             SELECT estudiantes.user_id, estudiantes.grupos_id
                                                                                             FROM estudiantes
                                                                                             WHERE estudiantes.user_id NOT IN (SELECT estudiantes.user_id
                                                                                                                                FROM estudiantes INNER JOIN opt_ests ON estudiantes.user_id = opt_ests.id_est)) as e ON g.id = e.grupos_id) as e ON u.id = e.user_id
                                                                                            ');
            $cant_est = sizeof($usuarios_matriculados);

            return view("Modulo_Optativas.optativa.show")
                ->with('optativa', $optativa)
                ->with('usuarios_matriculados', $usuarios_matriculados)
                ->with('cant_est', $cant_est)
                ->with('usuarios_no_matriculados', $usuarios_no_matriculados);
        } else {
            abort(401);
        }
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

        $opt = Optativa::find($id);

        if ($anno === $opt->anno_academico || (User::find(auth()->id())->hasRole('Vicedecana'))) {

            $prof_auxiliar = $opt->prof_auxiliar == NULL ? 0 : $opt->prof_auxiliar;
            $prof_principal = $opt->prof_principal == NULL ? 0 : $opt->prof_principal;
            if (User::find(auth()->id())->hasRole('Vicedecana')) {
                $profesores = DB::select('SELECT u.id,
        CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as prof_nombre
        FROM users as u
        INNER JOIN (SELECT profesores.user_id
                               FROM profesores
                               WHERE profesores.user_id NOT IN (SELECT optativas.prof_auxiliar
                                                                FROM optativas
                                                                WHERE optativas.prof_auxiliar <> ' . $prof_auxiliar . '
                                                                UNION SELECT optativas.prof_principal
                                                                FROM optativas
                                                                WHERE optativas.prof_principal <> ' . $prof_principal . ')) as p ON u.id = p.user_id

');
            } else {
                $profesores = DB::select('SELECT u.id,
            CONCAT(u.primer_nombre," ",u.segundo_nombre," ",u.primer_apellido," ",u.segundo_apellido) as prof_nombre
            FROM users as u
            INNER JOIN (SELECT profesores.user_id
                                   FROM profesores
                                   WHERE profesores.user_id NOT IN (SELECT optativas.prof_auxiliar
                                                                    FROM optativas
                                                                    WHERE optativas.prof_auxiliar <> ' . $prof_auxiliar . '
                                                                    UNION SELECT optativas.prof_principal
                                                                    FROM optativas
                                                                    WHERE optativas.prof_principal <> ' . $prof_principal . ')) as p ON u.id = p.user_id
                                                                    WHERE u.anno = ' . $anno . '
    ');
            }

            return view('Modulo_Optativas.optativa.edit')
                ->with('optativa', $opt)
                ->with('profesores', $profesores);
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

        $optativa = Optativa::find($id);

        $optativa->nombre = $request->get('nombre');
        $optativa->descripcion = $request->get('descripcion');
        $optativa->prof_principal = $request->get('prof_principal');
        $optativa->prof_auxiliar = $request->get('prof_auxiliar');
        $optativa->capacidad = $request->get('capacidad');
        $optativa->anno_academico = $request->get('anno_academico');
        $optativa->semestre = $request->get('semestre');
        $optativa->estado = $request->get('estado');

        $optativa->save();

        return redirect()->route('optativa.index')->with('info', 'modificar-optativa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $optativa = Optativa::find($id);

        $optativa->delete();

        return redirect()->route('optativa.index')->with('info', 'eliminar-afectacion');
    }
}
