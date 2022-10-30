<?php

namespace App\Http\Controllers\Modulo_Horario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Modulo_Horario\Buscar;

function buscar($anno, $semana, $grupo)
{
    $g = array();
    $g = DB::select('SELECT grupos.* FROM grupos WHERE name = "' . $grupo . '" AND anno = ' . $anno . '')[0];
    //var_dump($g);
    return publicar($g->id, $semana);
}


//funcion que publica el horario
function publicar($grupo, $semana)
{
    $horario = array(array(), array());

    for ($dia = 1; $dia < 6; $dia++) {
        for ($turno = 1; $turno < 7; $turno++) {
            // array_push($horario, array("dia" => $dia, "turno" => $turno, "colocar" => colocar($dia, $turno, $grupo)));
            $horario[$dia][$turno] = colocar($dia, $turno, $grupo, $semana);
        }
    }
    return $horario;
}



function colocar($dia, $truno, $id_grupo, $semana)
{

    $asig = DB::select('SELECT asignaturas.nombre
        FROM asignaturas
        WHERE asignaturas.id IN (SELECT planificacions.asignaturas_id
                    FROM planificacions
                    WHERE planificacions.id IN (SELECT asignaciones.planificacion_id
                                                    FROM asignaciones
                                                    WHERE asignaciones.disponibilidad_id IN (SELECT disponibilidad.id
                                                                                FROM disponibilidad
                                                                                WHERE disponibilidad.dia = ' . $dia . '
                                                                                AND disponibilidad.turno = ' . $truno . '
                                                                                AND disponibilidad.id IN (SELECT asignaciones.disponibilidad_id
                                                                                                                FROM asignaciones
                                                                                                                WHERE asignaciones.planificacion_id IN (SELECT planificacions.id
                                                                                                                                                FROM planificacions
                                                                                                                                                WHERE planificacions.grupos_id = ' . $id_grupo . ')
                                                                                                                                                AND asignaciones.semana = ' . $semana . '))
                                                AND asignaciones.estado = 1 ))

');

    $local = DB::select('SELECT locales.*, d.profesores_id
    FROM locales INNER JOIN (SELECT d.locales_id, a.profesores_id
                        FROM disponibilidad as d INNER JOIN (SELECT a.disponibilidad_id, p.profesores_id
                                                             FROM asignaciones as a INNER JOIN (SELECT planificacions.id, planificacions.profesores_id
                                                                                     FROM planificacions
                                                                                     WHERE planificacions.grupos_id = ' . $id_grupo . ') as p ON a.planificacion_id = p.id
                                                             WHERE a.estado = 1 AND a.semana = ' . $semana . ') as a ON d.id = a.disponibilidad_id

                        WHERE d.dia = ' . $dia . '
                        AND d.turno = ' . $truno . ') as d ON locales.id = d.locales_id');


    if (!empty($local)) {
        $tipo_de_local = $local[0]->tipo_de_locales_id;
        $prof = $local[0]->profesores_id;
        $tipo = DB::select('SELECT id, tipo FROM tipo_de_locales WHERE id = ' . $tipo_de_local . '');

        if ($tipo[0]->id == 1 && $prof != null) {
            $tipo_de_clase = 'C';
        }
        if ($tipo[0]->id == 1 && $prof == null) {
            $tipo_de_clase = 'PP';
        }
        if ($tipo[0]->id == 2 && $prof != null) {
            $tipo_de_clase = 'CP';
        }
        if ($tipo[0]->id == 3 && $prof != null) {
            $tipo_de_clase = 'LAB';
        }
    }

    if (!empty($asig) && !empty($tipo_de_clase) && !empty($local) && !empty($tipo)) {

        return $asig[0]->nombre . "(" . $tipo_de_clase . ")" . $tipo[0]->tipo . "-" . $local[0]->local;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
class BuscarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function buscar(Request $request)
    {
        // $anno = $request->get('anno');
        // $semana = $request->get('semana');
        // $grupo = $request->get('grupo');
        // return view('Modulo_Horario.horario.index');


        return buscar(
            $request->anno,
            $request->semana,
            $request->grupo
        );

        // if($anno && $semana && $grupo)
        // {
        //     return buscar($anno, $semana, $grupo);
        // }

    }

    public function index()
    {
        // $anno = $request->get('anno');
        // $semana = $request->get('semana');
        // $grupo = $request->get('grupo');
        // echo 'Hola';
        // $resultado = buscar($buscar->anno, $buscar->semana, $buscar->grupo);
        // return view('Modulo_Horario.horario.index', compact('hola'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
