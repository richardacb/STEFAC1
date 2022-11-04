<?php

namespace App\Http\Controllers\Modulo_PerfildeUsuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_PerfildeUsuario\Diagnosticopreventivo;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DiagnosticopreventivoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Modulo_PerfildeUsuario.diagnosticopreventivo.index')->only('index');
        $this->middleware('can:Modulo_PerfildeUsuario.diagnosticopreventivo.create')->only('create', 'store');
        $this->middleware('can:Modulo_PerfildeUsuario.diagnosticopreventivo.edit')->only('edit', 'update');
        $this->middleware('can:Modulo_PerfildeUsuario.diagnosticopreventivo.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Contar los que consumen alcohol
        $count_consumoSA = count(DB::table('diagnosticopreventivo')->where("adicciones_Alcohol", "Consumo social de alcohol")->get());
        $count_consumoRA = count(DB::table('diagnosticopreventivo')->where("adicciones_Alcohol", "Consumo riesgoso de alcohol")->get());

        //Contar los que consumen cigarros
        $count_consumoTR = count(DB::table('diagnosticopreventivo')->where("adicciones_Tabaco", "Consumo regular de Cigarros")->get());
        $count_consumoTO = count(DB::table('diagnosticopreventivo')->where("adicciones_Tabaco", "Consumo ocasional de cigarros")->get());

        //Contar los que consumen Café
        $count_consumoDC = count(DB::table('diagnosticopreventivo')->where("adicciones_Café", "Consumo dañino de Café")->get());
        //dd($count_consumoDC);
        //Contar los que tienen Tecnoadicciones
        $count_consumoC = count(DB::table('diagnosticopreventivo')->where("adicciones_Tecnoadicciones", "Ciberadicción")->get());
        $count_consumoUEV = count(DB::table('diagnosticopreventivo')->where("adicciones_Tecnoadicciones", "Uso excesivo de videojuegos")->get());

        //Contar los que consumen Drogas
        $count_consumoCO = count(DB::table('diagnosticopreventivo')->where("adicciones_Drogas", "Cocaina")->get());
        $count_consumoMA = count(DB::table('diagnosticopreventivo')->where("adicciones_Drogas", "Marihuana")->get());
        $count_consumoDS = count(DB::table('diagnosticopreventivo')->where("adicciones_Drogas", "drogas sintéticas")->get());

        //Contar los que consumen Medicamentos
        $count_consumoCMPM = count(DB::table('diagnosticopreventivo')->where("tipo_medicamentos", "Consumo de medicamentos por prescripción médica")->get());
        $count_consumoCMA = count(DB::table('diagnosticopreventivo')->where("tipo_medicamentos", "Consumo de medicamentos por automedicación")->get());

        //Contar los que pertenecen a grupos sociales
        $count_grupo_socialHI = count(DB::table('diagnosticopreventivo')->where("grupo_social", "Hippies")->get());
        $count_grupo_socialRO = count(DB::table('diagnosticopreventivo')->where("grupo_social", "Rockeros")->get());
        $count_grupo_socialRA = count(DB::table('diagnosticopreventivo')->where("grupo_social", "Raperos")->get());
        $count_grupo_socialGO = count(DB::table('diagnosticopreventivo')->where("grupo_social", "Góticos")->get());
        $count_grupo_socialDA = count(DB::table('diagnosticopreventivo')->where("grupo_social", "Darks")->get());
        $count_grupo_socialEM = count(DB::table('diagnosticopreventivo')->where("grupo_social", "Emos")->get());
        $count_grupo_socialPU = count(DB::table('diagnosticopreventivo')->where("grupo_social", "Punk")->get());
        $count_grupo_socialHE = count(DB::table('diagnosticopreventivo')->where("grupo_social", "Heavyes")->get());

        //Contar los que consumen cigarros
        $count_creencia_religiosaA = count(DB::table('diagnosticopreventivo')->where("creencia_religiosa", "Ateos")->get());
        $count_creencia_religiosaCA = count(DB::table('diagnosticopreventivo')->where("creencia_religiosa", "Católicos")->get());
        $count_creencia_religiosaCI = count(DB::table('diagnosticopreventivo')->where("creencia_religiosa", "Cristianos")->get());
        $count_creencia_religiosaPO = count(DB::table('diagnosticopreventivo')->where("creencia_religiosa", "Protestantes")->get());
        $count_creencia_religiosaSA = count(DB::table('diagnosticopreventivo')->where("creencia_religiosa", "Santería")->get());
        $count_creencia_religiosaYO = count(DB::table('diagnosticopreventivo')->where("creencia_religiosa", "Yoruba")->get());
        $count_creencia_religiosaHER = count(DB::table('diagnosticopreventivo')->where("creencia_religiosa", "Hermandad")->get());
        $count_creencia_religiosaPM = count(DB::table('diagnosticopreventivo')->where("creencia_religiosa", "Palo Monte")->get());

        //Contar los que tiene tipos de problemas
        $count_probPE = count(DB::table('diagnosticopreventivo')->where("prob_de_personalidad", "Problemas de personalidad")->get());
        $count_probPS = count(DB::table('diagnosticopreventivo')->where("prob_de_psiquiatricos", "Problemas psiquiátricos")->get());
        $count_probEC = count(DB::table('diagnosticopreventivo')->where("prob_de_economicos", "Problemas económicos")->get());
        $count_probSO = count(DB::table('diagnosticopreventivo')->where("prob_de_sociales", "Problemas sociales")->get());
        $count_probFA = count(DB::table('diagnosticopreventivo')->where("prob_de_familiares", "Problemas familiares")->get());
        $count_probAC = count(DB::table('diagnosticopreventivo')->where("prob_de_academicos", "Problemas académicos")->get());
        $count_probDI = count(DB::table('diagnosticopreventivo')->where("prob_de_disciplina", "Problemas de disciplina")->get());
        $count_probAS = count(DB::table('diagnosticopreventivo')->where("prob_de_asistencia", "Problemas de asistencia")->get());

        session()->put('anno', User::find(auth()->id())->anno);
        $anno  = session()->get('anno');


        if (User::find(auth()->id())->hasRole('Vicedecana')) {
            $diagnosticopreventivo = DB::select('SELECT e.user_id, users.anno as anno, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_estudiante,e.grupo, e.dp_id
                               FROM users INNER JOIN (SELECT e.user_id, g.name as grupo, e.dp_id
                                                      FROM (SELECT e.user_id, e.grupos_id,dp.id as dp_id
                                                            FROM estudiantes as e INNER JOIN diagnosticopreventivo as dp ON e.user_id = dp.user_id) as e
                                                      INNER JOIN profesores as p ON e.grupos_id = p.grupos_id
                                                      INNER JOIN grupos as g ON e.grupos_id = g.id
                                                      ) as e ON users.id = e.user_id AND users.tipo_de_usuario = "Estudiante"
        ');
        } else if (User::find(auth()->id())->hasRole('ProfesorJefeAño')) {
            $diagnosticopreventivo = DB::select('SELECT e.user_id, users.anno as anno, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_estudiante,e.grupo, e.dp_id
            FROM users INNER JOIN (SELECT e.user_id, g.name as grupo, e.dp_id
                                   FROM (SELECT e.user_id, e.grupos_id,dp.id as dp_id
                                         FROM estudiantes as e INNER JOIN diagnosticopreventivo as dp ON e.user_id = dp.user_id) as e
                                   INNER JOIN profesores as p ON e.grupos_id = p.grupos_id
                                   INNER JOIN grupos as g ON e.grupos_id = g.id
                                   ) as e ON users.id = e.user_id AND users.tipo_de_usuario = "Estudiante" AND users.anno = ' . $anno . '
        ');
        } else {
            $diagnosticopreventivo = DB::select('SELECT e.user_id, users.anno as anno, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_estudiante,e.grupo, e.dp_id
        FROM users INNER JOIN (SELECT e.user_id, g.name as grupo, e.dp_id
                               FROM (SELECT e.user_id, e.grupos_id,dp.id as dp_id
                                     FROM estudiantes as e INNER JOIN diagnosticopreventivo as dp ON e.user_id = dp.user_id) as e
                               INNER JOIN profesores as p ON e.grupos_id = p.grupos_id
                               INNER JOIN grupos as g ON e.grupos_id = g.id
                               WHERE p.user_id = ' . auth()->id() . ') as e ON users.id = e.user_id AND users.tipo_de_usuario = "Estudiante" AND users.anno = ' . $anno . '
        ');
        }

        return view(
            'Modulo_PerfildeUsuario.diagnosticopreventivo.index',
            compact(
                'diagnosticopreventivo',
                'count_consumoSA',
                'count_consumoRA',
                'count_consumoTR',
                'count_consumoTO',
                'count_consumoDC',
                'count_consumoC',
                'count_consumoUEV',
                'count_consumoCO',
                'count_consumoMA',
                'count_consumoDS',
                'count_consumoCMPM',
                'count_consumoCMA',
                'count_grupo_socialHI',
                'count_grupo_socialRO',
                'count_grupo_socialRA',
                'count_grupo_socialGO',
                'count_grupo_socialDA',
                'count_grupo_socialEM',
                'count_grupo_socialPU',
                'count_grupo_socialHE',
                'count_creencia_religiosaA',
                'count_creencia_religiosaCA',
                'count_creencia_religiosaCI',
                'count_creencia_religiosaPO',
                'count_creencia_religiosaSA',
                'count_creencia_religiosaYO',
                'count_creencia_religiosaHER',
                'count_creencia_religiosaPM',
                'count_probPE',
                'count_probPS',
                'count_probEC',
                'count_probSO',
                'count_probFA',
                'count_probAC',
                'count_probDI',
                'count_probAS',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $adicciones_Alcohol = ['Consumo social de alcohol' => 'Consumo social de alcohol', 'Consumo riesgoso de alcohol' => 'Consumo riesgoso de alcohol'];
        $adicciones_Tabaco = ['Consumo ocasional de cigarros' => 'Consumo ocasional de cigarros', 'Consumo regular de Cigarros' => 'Consumo regular de Cigarros'];
        $adicciones_Café = ['Consumo dañino de Café' => 'Consumo dañino de Café'];
        $adicciones_Tecnoadicciones = ['Ciberadicción' => 'Ciberadicción', 'Uso excesivo de videojuegos' => 'Uso excesivo de videojuegos'];
        $adicciones_Drogas = ['Cocaina' => 'Cocaina', 'Marihuana' => 'Marihuana', 'drogas sintéticas' => 'drogas sintéticas'];
        $tipo_medicamentos = ['Consumo de medicamentos por prescripción médica' => 'Consumo de medicamentos por prescripción médica', 'Consumo de medicamentos por automedicación' => 'Consumo de medicamentos por automedicación'];
        $grupo_social = ['Hippies' => 'Hippies', 'Rockeros' => 'Rockeros', 'Raperos' => 'Raperos', 'Góticos' => 'Góticos', 'Emos' => 'Emos', 'Punk' => 'Punk', 'Heavyes' => 'Heavyes', 'Darks' => 'Darks',];
        $creencia_religiosa = ['Ateos' => 'Ateos', 'Católicos' => 'Católicos', 'Cristianos' => 'Cristianos', 'Protestantes' => 'Protestantes', 'Santería' => 'Santería', 'Yoruba' => 'Yoruba', 'Hermandad' => 'Hermandad', 'Palo Monte' => 'Palo Monte'];


        $anno  = session()->get('anno');
        if (User::find(auth()->id())->hasRole('Vicedecana')) {
            $users = DB::select('SELECT e.user_id as id,users.anno, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_estudiante
        FROM users INNER JOIN (SELECT e.user_id
                               FROM (SELECT e.user_id, e.grupos_id
                                   FROM estudiantes as e
                                   WHERE e.user_id NOT IN (SELECT e.user_id
                                   FROM estudiantes as e INNER JOIN diagnosticopreventivo as dp ON e.user_id = dp.user_id)) as e
                               INNER JOIN profesores as p ON e.grupos_id = p.grupos_id
                               ) as e ON users.id = e.user_id AND users.tipo_de_usuario = "Estudiante"
        ');
        } else if (User::find(auth()->id())->hasRole('ProfesorJefeAño')) {
            $users = DB::select('SELECT e.user_id as id,users.anno, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_estudiante
        FROM users INNER JOIN (SELECT e.user_id
                               FROM (SELECT e.user_id, e.grupos_id
                                   FROM estudiantes as e
                                   WHERE e.user_id NOT IN (SELECT e.user_id
                                   FROM estudiantes as e INNER JOIN diagnosticopreventivo as dp ON e.user_id = dp.user_id)) as e
                               INNER JOIN profesores as p ON e.grupos_id = p.grupos_id
                               ) as e ON users.id = e.user_id AND users.tipo_de_usuario = "Estudiante" AND users.anno = ' . $anno . '
        ');
        } else {
            $users = DB::select('SELECT e.user_id as id,users.anno, CONCAT(users.primer_nombre," ",users.segundo_nombre," ",users.primer_apellido," ",users.segundo_apellido) as nombre_estudiante
        FROM users INNER JOIN (SELECT e.user_id
                               FROM (SELECT e.user_id, e.grupos_id
                                   FROM estudiantes as e
                                   WHERE e.user_id NOT IN (SELECT e.user_id
                                   FROM estudiantes as e INNER JOIN diagnosticopreventivo as dp ON e.user_id = dp.user_id)) as e
                               INNER JOIN profesores as p ON e.grupos_id = p.grupos_id
                               WHERE p.user_id = ' . auth()->id() . ') as e ON users.id = e.user_id AND users.tipo_de_usuario = "Estudiante" AND users.anno = ' . $anno . '
        ');
        }
        $diagnosticopreventivo = Diagnosticopreventivo::all();
        return view('Modulo_PerfildeUsuario.diagnosticopreventivo.create', compact(
            'users',
            'diagnosticopreventivo',
            'adicciones_Alcohol',
            'adicciones_Tabaco',
            'adicciones_Café',
            'adicciones_Tecnoadicciones',
            'adicciones_Drogas',
            'tipo_medicamentos',
            'grupo_social',
            'creencia_religiosa',
        ));
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
            'nacionalidad' => 'required',
        ];
        $messages = [
            'user_id.required' => 'Campo Requerido',
            'nacionalidad.required' => 'Campo Requerido',
        ];

        $this->validate($request, $rules, $messages);



        $diagnosticopreventivo = Diagnosticopreventivo::create($request->all());

        return redirect()->route('diagnosticopreventivo.index')->with('info', 'adicionar-diagnostico-estudiantes');
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

        $select_anno = DB::select('SELECT users.anno FROM users WHERE users.id = (SELECT diagnosticopreventivo.user_id FROM diagnosticopreventivo WHERE diagnosticopreventivo.id = ' . $id . ')');

        if ($anno === $select_anno[0]->anno || (User::find(auth()->id())->hasRole('Vicedecana'))) {

            $adicciones_Alcohol = ['Consumo social de alcohol' => 'Consumo social de alcohol', 'Consumo riesgoso de alcohol' => 'Consumo riesgoso de alcohol'];
            $adicciones_Tabaco = ['Consumo ocasional de cigarros' => 'Consumo ocasional de cigarros', 'Consumo regular de Cigarros' => 'Consumo regular de Cigarros'];
            $adicciones_Café = ['Consumo dañino de Café' => 'Consumo dañino de Café'];
            $adicciones_Tecnoadicciones = ['Ciberadicción' => 'Ciberadicción', 'Uso excesivo de videojuegos' => 'Uso excesivo de videojuegos'];
            $adicciones_Drogas = ['Cocaina' => 'Cocaina', 'Marihuana' => 'Marihuana', 'drogas sintéticas' => 'drogas sintéticas'];
            $tipo_medicamentos = ['Consumo de medicamentos por prescripción médica' => 'Consumo de medicamentos por prescripción médica', 'Consumo de medicamentos por automedicación' => 'Consumo de medicamentos por automedicación'];
            $grupo_social = ['Hippies' => 'Hippies', 'Rockeros' => 'Rockeros', 'Raperos' => 'Raperos', 'Góticos' => 'Góticos', 'Emos' => 'Emos', 'Punk' => 'Punk', 'Heavyes' => 'Heavyes', 'Darks' => 'Darks',];
            $creencia_religiosa = ['Ateos' => 'Ateos', 'Católicos' => 'Católicos', 'Cristianos' => 'Cristianos', 'Protestantes' => 'Protestantes', 'Santería' => 'Santería', 'Yoruba' => 'Yoruba', 'Hermandad' => 'Hermandad', 'Palo Monte' => 'Palo Monte'];

            $diagnosticopreventivo = Diagnosticopreventivo::findOrFail($id);

            return view('Modulo_PerfildeUsuario.diagnosticopreventivo.edit', compact('diagnosticopreventivo', 'adicciones_Alcohol', 'adicciones_Tabaco', 'adicciones_Café', 'adicciones_Tecnoadicciones', 'adicciones_Drogas', 'tipo_medicamentos', 'grupo_social', 'creencia_religiosa'));
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

        echo $request->adicciones_Café;
        echo $request->prob_de_personalidad;
        echo 'ok';
         $diagnosticopreventivo = Diagnosticopreventivo::findOrFail($id);
        $rules = [
            'nacionalidad' => 'required',
        ];
        $messages = [
            'nacionalidad.required' => 'Campo Requerido',
        ];

        $this->validate($request, $rules, $messages);
        $diagnosticopreventivo->prob_de_personalidad = $request->get('prob_de_personalidad');
        $diagnosticopreventivo->prob_de_psiquiatricos = $request->get('prob_de_psiquiatricos');
        $diagnosticopreventivo->prob_de_economicos = $request->get('prob_de_economicos');
        $diagnosticopreventivo->prob_de_sociales = $request->get('prob_de_sociales');
        $diagnosticopreventivo->prob_de_familiares = $request->get('prob_de_familiares');
        $diagnosticopreventivo->prob_de_academicos = $request->get('prob_de_academicos');
        $diagnosticopreventivo->prob_de_disciplina = $request->get('prob_de_disciplina');
        $diagnosticopreventivo->prob_de_asistencia = $request->get('prob_de_asistencia');
        $diagnosticopreventivo->update($request->all());

        return redirect()->route('usuarios.show', $diagnosticopreventivo->users->id)->with('info', 'modificar-diagnostico');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diagnosticopreventivo = Diagnosticopreventivo::findOrFail($id);

        $diagnosticopreventivo->delete();

        return redirect()->route('diagnosticopreventivo.index')->with('info', 'eliminar-datos-diagnosticopreventivo');
    }
    // public function exportExcel()
    // {
    //     return Excel::download(new BalancedecargaExport, 'Balance de Carga.xlsx');
    // }
}
