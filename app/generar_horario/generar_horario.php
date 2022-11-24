<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seccion = $_POST["seccion"];
    $anno = $_POST["anno"];
    $semana = $_POST["semana"];


    generar($seccion, $anno, $semana, $conn);

    header("Location: http://127.0.0.1:8000/admin/generarhorario?ok=1");
    die();
}


function generar($seccion, $anno, $semana, $conn)
{

    $balance_de_carga = array();
    //seleccionar los balances de cargas correspondientes al anno y a la semana
    $sql = "SELECT balance_de_carga.*
    FROM balance_de_carga INNER JOIN asignaturas ON balance_de_carga.asignaturas_id = asignaturas.id
    WHERE balance_de_carga.semana = '$semana' AND asignaturas.anno = '$anno' ORDER BY balance_de_carga.frecuencia DESC";



    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($balance_de_carga, array("id" => intval($row['id']), "id_asig" => intval($row['asignaturas_id']), "tipodeclase" => $row['tipo_clase'], "semana" => intval($row['semana'])));
        }
    }
    //var_dump($balance_de_carga);

    //     //recorriendo balance de carga correspondiente al año y semana de clase
    foreach ($balance_de_carga as $bc) {
        $tipodeclase = $bc['tipodeclase'];
        //separando cada tipo de clase
        $tipo_de_clase = explode(",", "$tipodeclase");
        //var_dump($tipo_de_clase);
        //recorriendo cada tipo de clase
        foreach ($tipo_de_clase as $tc) {
            if (check_bc_isGenenated($bc['id_asig'], $tc, $anno, $semana, $conn)) {
                //filtrar planificaciones correspondientes a la asignatura y el tipo de clase
                //var_dump($tc);
                $planificaciones = devolver_planif($bc['id_asig'], $tc, $conn);
                //var_dump($planificaciones);
                // recorriendo planificaciones filtradas por el año y asignatura correspondiente
                foreach ($planificaciones as $p) {
                    //filtrar locales diponibles de acuerdo al tipo de clase
                    $disponibilidad = devolver_locales($bc['id_asig'], $seccion, $tc, $conn);
                    //var_dump($disponibilidad);
                    //recorriendo locales disponibles para asignar un local disponible a cada planificación
                    foreach ($disponibilidad as $ld) {

                        //comprobar si disponibilidad actual no esta ocupada
                        if (!ocupada($p['id'], $ld['id'], $bc['id_asig'], $tc, $anno, $semana, $conn)) {

                            //comprobar que no se imparta más de 1 turno de la misma asignatura el mismo dia al mismo grupo
                            //comprobar que un mismo grupo no este en varios locales el mismo dia y el mismo turno
                            //comprobar que un profesor no este el mismo dia y el mismo turno en más de 1 local a la vez

                            if (!comprobar($p['id_asig'], $p['id_grupo'], $p['id_prof'], $ld['dia'], $ld['turno'], $anno, $semana, $conn)) {
                                //relacionar disponibilidad con planificacion en relaciones
                                relacionar($ld['id'], $p['id'], $anno, $semana, $conn);

                                break;
                            }
                        }
                    }
                }
            }
        }
    }
    
}
//


function check_bc_isGenenated($id_asig, $tc, $anno, $semana, $conn)
{

    $sql = " SELECT * FROM asignaciones
    WHERE anno=$anno AND semana=$semana AND planificacion_id IN (SELECT id
                                                                    FROM planificacions
                                                                    WHERE asignaturas_id = $id_asig
                                                                    AND profesores_id IN (SELECT user_id
                                                                                            FROM profesores
                                                                                            WHERE profesores.tipo_de_clases LIKE '$tc'
                                                                                            OR profesores.tipo_de_clases LIKE '%,$tc'
                                                                                            OR profesores.tipo_de_clases LIKE '$tc,%'
                                                                                            OR profesores.tipo_de_clases LIKE '%,$tc,%'))
    ";

    // SELECT *
    // FROM profesores
    // WHERE profesores.tipo_de_clases LIKE 'C'
    // OR profesores.tipo_de_clases LIKE '%,C'
    // OR profesores.tipo_de_clases LIKE 'C,%'
    // OR profesores.tipo_de_clases LIKE '%,C,%'

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return false;
    } else {
        return true;
    }
}

//funcion que devuelve las planificaciones
function devolver_planif($bc_id_asig, $tc, $conn)
{
    $planificaciones = array();

    $sql = "SELECT planificacions.*
    FROM planificacions RIGHT JOIN
    (SELECT planificacions.profesores_id
                FROM planificacions
                WHERE planificacions.asignaturas_id = '$bc_id_asig'
                AND planificacions.profesores_id IN (SELECT user_id
                                                     FROM profesores
                                                     WHERE profesores.tipo_de_clases LIKE '$tc'
                                                     OR profesores.tipo_de_clases LIKE '%,$tc'
                                                     OR profesores.tipo_de_clases LIKE '$tc,%'
                                                     OR profesores.tipo_de_clases LIKE '%,$tc,%')
                                                     GROUP by planificacions.profesores_id
                                                     ORDER BY COUNT( planificacions.profesores_id)
                                                     DESC) as p ON p.profesores_id = planificacions.profesores_id";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($planificaciones, array("id" => intval($row['id']), "id_asig" => intval($row['asignaturas_id']), "id_grupo" => intval($row['grupos_id']), "id_prof" => intval($row['profesores_id'])));
        }
    }
    return $planificaciones;
}


function devolver_locales($id_asig, $seccion, $tc, $conn)
{

    $sql = "SELECT asignaturas.nombre FROM asignaturas WHERE asignaturas.id ='$id_asig'";
    $result = $conn->query($sql);
    $asig_nombre = $result->fetch_assoc();

    if ($asig_nombre['nombre'] == 'EF') {
        $tipo_de_local = 'Deporte';
    } else {
        if ($tc == 'C') {
            $tipo_de_local = 'Salon';
        }
        if ($tc == 'CP') {
            $tipo_de_local = 'Aula';
        }
        if ($tc == 'LAB') {
            $tipo_de_local = 'Laboratorio';
        }
    }

    $disponibilidad = array();

    if ($seccion == 1) {
        if ($asig_nombre['nombre'] == 'EF') {
            $sql = "SELECT *
            FROM disponibilidad
            WHERE turno IN ('5','6')
            AND disponibilidad.locales_id IN (SELECT locales.id
                                                FROM locales
                                                WHERE locales.tipo_de_locales_id = (SELECT id FROM tipo_de_locales WHERE tipo = '$tipo_de_local'))

                                                ORDER BY disponibilidad.dia, disponibilidad.turno";
        } else {
            $sql = "SELECT *
            FROM disponibilidad
            WHERE turno NOT IN ('4','5','6')
            AND disponibilidad.locales_id IN (SELECT locales.id
                                                FROM locales
                                                WHERE locales.tipo_de_locales_id = (SELECT id FROM tipo_de_locales WHERE tipo = '$tipo_de_local'))
                                                ORDER BY disponibilidad.dia, disponibilidad.turno";
        }
    }

    if ($seccion == 2) {
        if ($asig_nombre['nombre'] == 'EF') {
            $sql = "SELECT *
            FROM disponibilidad
            WHERE turno IN ('1','2')
            AND disponibilidad.locales_id IN (SELECT locales.id
                                                FROM locales
                                                WHERE locales.tipo_de_locales_id = (SELECT id FROM tipo_de_locales WHERE tipo = '$tipo_de_local'))
                                                ORDER BY disponibilidad.dia, disponibilidad.turno";
        } else {
            $sql = "SELECT *
            FROM disponibilidad
            WHERE turno NOT IN ('1','2','3')
            AND disponibilidad.locales_id IN (SELECT locales.id
                                                FROM locales
                                                WHERE locales.tipo_de_locales_id = (SELECT id FROM tipo_de_locales WHERE tipo = '$tipo_de_local'))
                                                ORDER BY disponibilidad.dia, disponibilidad.turno";
        }
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($disponibilidad, array("id" => intval($row['id']), "local_id" => intval($row['locales_id']), "dia" => intval($row['dia']), "turno" => intval($row['turno'])));
        }
    }

    return  $disponibilidad;
}


function ocupada($id_planif, $id_disp, $id_asig, $tc, $anno, $semana, $conn)
{


    $sql = "SELECT asignaturas.nombre FROM asignaturas WHERE asignaturas.id ='$id_asig'";
    $result = $conn->query($sql);
    $asig_nombre = $result->fetch_assoc();

    if ($asig_nombre['nombre'] == 'EF') {
        $tipo_de_local = 'Deporte';
    } else {
        if ($tc == 'C') {
            $tipo_de_local = 'Salon';
        }
        if ($tc == 'CP') {
            $tipo_de_local = 'Aula';
        }
        if ($tc == 'LAB') {
            $tipo_de_local = 'Laboratorio';
        }
        if ($tc == 'S') {
            $tipo_de_local = 'Aula';
        }
        if ($tc == 'T') {
            $tipo_de_local = 'Aula';
        }
    }


    $sql = "SELECT disponibilidad.id
    FROM disponibilidad
    WHERE disponibilidad.id NOT IN (SELECT asignaciones.disponibilidad_id
                                        FROM asignaciones WHERE asignaciones.semana = '$semana')
                                        AND disponibilidad.locales_id IN (SELECT locales.id
                                                                            FROM locales
                                                                            WHERE locales.tipo_de_locales_id = (SELECT id FROM tipo_de_locales WHERE tipo = '$tipo_de_local'))";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $sql1 = "SELECT $id_disp IN ($sql)";

        $result1 = $conn->query($sql1);
        $value = $result1->fetch_array()['0'];

        if ($value > 0) {
            return false;
        } else {
            return true;
        }
    } else {


        $sql2 = "SELECT planificacions.asignaturas_id, planificacions.profesores_id
        FROM planificacions
        WHERE planificacions.id = '$id_planif'";

        $result2 = $conn->query($sql2);

        $values = $result2->fetch_assoc();

        $id_prof = $values['profesores_id'];
        $id_mat = $values['asignaturas_id'];


        $sql5 = "SELECT asignaciones.disponibilidad_id
    FROM asignaciones
    WHERE asignaciones.planificacion_id IN (SELECT planificacions.id
                                  FROM planificacions
                                  WHERE planificacions.asignaturas_id = '$id_mat'
                                  AND planificacions.profesores_id = '$id_prof')
                                  AND asignaciones.semana = '$semana'
                                  GROUP BY asignaciones.disponibilidad_id
                                  ORDER BY COUNT(asignaciones.disponibilidad_id)
                                  LIMIT 1";
        $result5 = $conn->query($sql5);

        if ($result5->fetch_assoc()['disponibilidad_id'] == $id_disp) {
            return false;
        } else {
            return true;
        }
    }
}


function comprobar($id_asig, $id_grupo, $id_prof, $dia, $turno, $anno, $semana, $conn)
{
    //comprobar que no se imparta más de 1 turno de la misma asignatura el mismo dia al mismo grupo
    $sql = "SELECT disponibilidad.dia
    FROM disponibilidad
    WHERE disponibilidad.id IN (SELECT asignaciones.disponibilidad_id
                                    FROM asignaciones
                                    WHERE planificacion_id IN (SELECT planificacions.id
                                                        FROM planificacions
                                                        WHERE planificacions.asignaturas_id = '$id_asig'
                                                        AND planificacions.grupos_id = '$id_grupo')
                                                         AND asignaciones.semana = '$semana')
                                                        ORDER BY disponibilidad.dia DESC
                                                        LIMIT 1
";
    //comprobar que un mismo grupo no este en varios locales el mismo dia y el mismo turno
    $sql1 = "SELECT disponibilidad.id
                            FROM disponibilidad
                            WHERE disponibilidad.dia = '$dia'
                            AND disponibilidad.turno = '$turno'
                            AND disponibilidad.id IN (SELECT asignaciones.disponibilidad_id
                                                            FROM asignaciones
                                                            WHERE planificacion_id IN (SELECT planificacions.id
                                                                                FROM planificacions
                                                                                WHERE planificacions.grupos_id = '$id_grupo')
                                                                                 AND asignaciones.semana = '$semana')
";
    //comprobar que un profesor no este el mismo dia y el mismo turno en más de 1 local a la vez
    $sql2 = "SELECT disponibilidad.id
                            FROM disponibilidad
                            WHERE disponibilidad.dia = '$dia'
                            AND disponibilidad.turno = '$turno'
                            AND disponibilidad.id IN (SELECT asignaciones.disponibilidad_id
                                                            FROM asignaciones
                                                            WHERE planificacion_id IN (SELECT planificacions.id
                                                                                FROM planificacions
                                                                                WHERE planificacions.profesores_id = '$id_prof')
                                                                                 AND asignaciones.semana = '$semana')
";
    //comprobar que un profesor no este afcetado ese turno de ese dia de esa semana de ese anno

    // $cond_turno = !$turno ? "" : "AND a.turno = '$turno'";

    $sql3 = "SELECT a.id FROM afectaciones as a
WHERE a.profesores_afectados_id = '$id_prof'
AND a.dia = '$dia' AND a.semana ='$semana' AND a.anno='$anno' ";

    $sql4 = "SELECT a.id FROM afectaciones as a
WHERE a.profesores_afectados_id = '$id_prof'
AND a.dia = '$dia' AND a.semana ='$semana' AND a.anno='$anno' AND a.turno = '$turno' ";

    $sql5 = "SELECT a.id FROM afectaciones as a
WHERE a.profesores_afectados_id = '$id_prof'
AND a.dia = '$dia' AND a.semana ='$semana' AND a.anno='$anno' AND a.turno IS NULL ";



    $result3 = $conn->query($sql3);
    $result4 = $conn->query($sql4);
    $result5 = $conn->query($sql5);
    //var_dump($result3->fetch_assoc());
    $afect = 0;
    if ($result4->num_rows > 0) {
        $afect = 1;
    } else {
        if ($result5->num_rows > 0 && $result3->num_rows > 0) {
            $afect = 1;
        }
    }

    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);

    $dia2 = $result->fetch_assoc();

    if ($dia2 == null) {
        $value = 1;
    } else {
        $value = $dia - $dia2['dia'];
    }

    if (($value <= 0) || ($result1->num_rows > 0) || ($result2->num_rows > 0) || ($afect > 0)) {
        return true;
    } else {
        return false;
    }
}

function relacionar($id_disp, $id_planif, $anno, $semana, $conn)
{
    $sql = "INSERT INTO asignaciones (disponibilidad_id, planificacion_id, anno, semana, estado)
    VALUES ('$id_disp', '$id_planif', '$anno','$semana', 1)";
    $conn->query($sql);
}