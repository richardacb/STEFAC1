<?php
include('conexion.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["profesor_afectado_id"])) {
        $profesor_afectado_id = $_POST["profesor_afectado_id"];
        $anno = $_POST["anno"];
        $semana = $_POST["semana"];
        $dia = $_POST["dia"];
        $turno = $_POST["turno"];

        update($profesor_afectado_id, $anno, $semana, $dia, $turno, $conn);
        insert_afect($profesor_afectado_id, $anno, $semana, $dia, $turno, $conn);

        header("Location: http://127.0.0.1:8000/admin/afectaciones");
        die();
    }
    if (!empty($_POST["asignaturas_id"])) {
        $asignaturas_id = $_POST["asignaturas_id"];
        $anno = $_POST["anno"];
        $semana = $_POST["semana"];
        $semestre = $_POST["semestre"];
        $dia = $_POST["dia"];
        $turno = $_POST["turno"];
        $action = $_GET['form'];

        update2($action, $asignaturas_id, $semestre, $anno, $semana, $dia, $turno, $conn);
    }
}


function update($profesor_afectado_id, $anno, $semana, $dia, $turno, $conn)
{
    if (($turno == 1 || $turno == 2 || $turno == 3)) {
        $seccion  = 1;
    }
    if (($turno == 4 || $turno == 5 || $turno == 6)) {
        $seccion  = 2;
    }
    if ($turno == "") {
        $seccion  = 1;
    }



    $sql1 = "SELECT p.tipo_de_clases, p.asignaturas_id
    FROM profesores as p
    WHERE p.user_id = '$profesor_afectado_id'";

    $result1 = $conn->query($sql1);
    $values = $result1->fetch_assoc();
    $id_asig = $values['asignaturas_id'];
    $tc = $values['tipo_de_clases'];

    $afectaciones = array();
    // var_dump($turno);

    $cond_turno = !$turno ? "" : "AND d.turno = '$turno'";

    $sql = "SELECT a.*
                    FROM asignaciones as a
                    WHERE a.planificacion_id IN (SELECT p.id FROM planificacions as p WHERE p.profesores_id = ' $profesor_afectado_id ')
                    AND a.disponibilidad_id IN (SELECT d.id FROM disponibilidad as d WHERE d.dia = '$dia' $cond_turno)
                    AND a.anno = '  $anno '
                    AND a.semana = ' $semana '";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($afectaciones, array(
                "id" => intval($row['id']),
                "disp_id" => intval($row['disponibilidad_id']),
                "planif_id" => intval($row['planificacion_id']),
                "anno" => intval($row['anno']),
                "semana" => intval($row['semana']),
                "estado" => intval($row['estado'])
            ));
        }
    }

    $disp_afect = "SELECT d.id FROM disponibilidad as d WHERE d.dia = '$dia' $cond_turno";
    // $result2 = $conn->query($sql2);

    // if ($result2->num_rows > 0) {
    //     while ($disp = $result2->fetch_assoc()) {
    //         echo $disp['id']."<br>";
    //     }
    // }

    //recorriendo afectaciones para hacer intercambio de disponibilidad
    foreach ($afectaciones as $a) {

        //echo $a['id']."<br>";
        //filtrar locales diponibles de acuerdo al tipo de clase
        $disponibilidad = devolver_locales($id_asig, $seccion, $tc, $disp_afect, $conn);
        // foreach ($disponibilidad as $d) {
        //     echo $d['dia']. "</br>";
        // }


        // //recorriendo locales disponibles para asignar un local disponible a cada planificación
        foreach ($disponibilidad as $ld) {

            //echo $ld['id']."<br>";
            //comprobar si disponibilidad actual no esta ocupada
            if (!ocupada($a['planif_id'], $ld['id'], $id_asig, $tc, $semana, $anno, $conn)) {

                //echo ocupada($a['planif_id'], $ld['id'], $id_asig, $tc, $disp_afect, $conn)."<br>";
                //comprobar que no se imparta más de 1 turno de la misma asignatura el mismo dia al mismo grupo
                //comprobar que un mismo grupo no este en varios locales el mismo dia y el mismo turno
                //comprobar que un profesor no este el mismo dia y el mismo turno en más de 1 local a la vez
                $sql3 = "SELECT p.grupos_id FROM profesores as p WHERE p.user_id = '$profesor_afectado_id'";

                $result3 = $conn->query($sql3);
                $value = $result3->fetch_assoc();
                $id_grupo = $value['grupos_id'];

                if (!comprobar(
                    $id_asig,
                    $id_grupo,
                    $profesor_afectado_id,
                    $ld,
                    $disp_afect,
                    $turno,
                    $semana,
                    $anno,
                    $conn
                )) {
                    //relacionar disponibilidad con planificacion en relaciones
                    relacionar($ld['id'], $a['planif_id'], $anno, $semana, $conn);

                    break;
                }
            }
        }
    }
}


function insert_afect($profesor_afectado_id, $anno, $semana, $dia, $turno, $conn)
{

    $cond_turno = !$turno ? "" : "AND d.turno = '$turno'";

    $sql = "SELECT a.*
    FROM asignaciones as a
    WHERE a.planificacion_id IN (SELECT p.id FROM planificacions as p WHERE p.profesores_id = ' $profesor_afectado_id ')
    AND a.disponibilidad_id IN (SELECT d.id FROM disponibilidad as d WHERE d.dia = '$dia' $cond_turno)
    AND a.anno = '  $anno '
    AND a.semana = ' $semana '";


    $insert = "INSERT INTO afectaciones(profesores_afectados_id, dia, semana, turno, anno)
    VALUES ('$profesor_afectado_id','$dia','$semana','$turno','$anno')";

    $conn->query($insert);

    // $sql = "UPDATE asignaciones as a SET a.estado = 0
    // WHERE a.planificacion_id IN (SELECT p.id FROM planificacions as p WHERE p.profesores_id = ' $profesor_afectado_id ')
    // AND a.disponibilidad_id IN (SELECT d.id FROM disponibilidad as d WHERE d.dia = ' $dia ' $cond_turno)
    // AND a.anno = ' $anno '
    // AND a.semana = ' $semana'";

    $delete_afect = "DELETE FROM asignaciones WHERE asignaciones.id IN (SELECT a.id FROM ($sql) as a)";
    $conn->query($delete_afect);

    // $conn->query($sql);
}
//

function update2($action, $asignaturas_id, $semestre, $anno, $semana, $dia, $turno, $conn)
{

    if (($turno == 1 || $turno == 2 || $turno == 3)) {
        $seccion  = 1;
    }
    if (($turno == 4 || $turno == 5 || $turno == 6)) {
        $seccion  = 2;
    }

    // $sql = "SELECT asignaciones.*
    // FROM asignaciones
    // WHERE asignaciones.semana = $semana
    // AND asignaciones.planificacion_id IN (SELECT planificacions.id FROM planificacions WHERE planificacions.asignaturas_id <> $asignaturas_id
    //                                       AND planificacions.profesores_id IS NULL)
    // AND asignaciones.disponibilidad_id IN (SELECT disponibilidad.id FROM disponibilidad WHERE disponibilidad.dia = $dia AND disponibilidad.turno = $turno
    //                                        AND disponibilidad.locales_id IN (SELECT locales.id FROM locales WHERE locales.tipo_de_locales_id = 1))";

    // $result = $conn->query($sql);


    $select_pl = "SELECT asignaciones.*
    FROM asignaciones
    WHERE asignaciones.semana = $semana
    AND asignaciones.anno = $anno
    AND asignaciones.planificacion_id IN (SELECT planificacions.id FROM planificacions WHERE planificacions.asignaturas_id = $asignaturas_id
                                      AND planificacions.profesores_id IS NULL)";

    $result_pl = $conn->query($select_pl);


    if ($action == 'create_pp') {

        if ($result_pl->num_rows > 0) {
            redirect("parciales", "La Prueba Parcial ya está planificada esa semana");
        } else {
            $sql = "SELECT asignaciones.*
            FROM asignaciones
            WHERE asignaciones.semana = $semana
            AND asignaciones.planificacion_id IN (SELECT planificacions.id FROM planificacions WHERE planificacions.asignaturas_id <> $asignaturas_id
                                                  AND planificacions.profesores_id IS NULL)
            AND asignaciones.disponibilidad_id IN (SELECT disponibilidad.id FROM disponibilidad WHERE disponibilidad.dia = $dia AND disponibilidad.turno = $turno
                                                   AND disponibilidad.locales_id IN (SELECT locales.id FROM locales WHERE locales.tipo_de_locales_id = 1))";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                redirect("parciales/create", "Turno ocupado por otra Prueba Parcial, elija otro turno para planificar su examen parcial");
            } else {
                
                crear_planif($asignaturas_id, $semestre, $anno, $semana, $dia, $turno, $seccion, $conn);
            }
        }
    }

}

function crear_planif($asignaturas_id, $semestre, $anno, $semana, $dia, $turno, $seccion, $conn)
{
    // slicitar grupos de acuerdo al anno
    $select_grup = "SELECT grupos.id FROM grupos WHERE grupos.anno = $anno";
    $result_grup = $conn->query($select_grup);
    $grup = array();
    if ($result_grup->num_rows > 0) {
        while ($row = $result_grup->fetch_assoc()) {
            array_push($grup, array(
                "id" => intval($row['id'])
            ));
        }
    }

    // crear e insertar planificaciones de las pruebas parciales
    foreach ($grup as $g) {

        $insert_planif = "INSERT INTO planificacions(profesores_id, asignaturas_id, grupos_id) VALUES (NULL,'$asignaturas_id'," . $g['id'] . ")";
        $conn->query($insert_planif);
    }

    asignar_pp($asignaturas_id, $semestre, $anno, $semana, $dia, $turno, $seccion, $conn);
}

function asignar_pp($asignaturas_id, $semestre, $anno, $semana, $dia, $turno, $seccion, $conn)
{

    $select_asig = "SELECT * FROM asignaciones WHERE asignaciones.semana = $semana";
    $result_asig = $conn->query($select_asig);

    // solicitar planificaciones de pruebas parciales
    $select_planif = "SELECT planificacions.id
    FROM planificacions
    WHERE planificacions.asignaturas_id = $asignaturas_id
    AND planificacions.profesores_id IS NULL
    AND planificacions.id NOT IN (SELECT asignaciones.planificacion_id
                                  FROM asignaciones
                                  WHERE asignaciones.anno = $anno
                                  AND asignaciones.semana <> $semana)";

    $result_planif = $conn->query($select_planif);

    $planif = array();

    if ($result_planif->num_rows > 0) {
        while ($row = $result_planif->fetch_assoc()) {
            array_push($planif, array(
                "id" => intval($row['id'])
            ));
        }
    }

    if ($result_asig->num_rows > 0) {

        foreach ($planif as $p) {
            //slicitar disponibilidad que aun tenga capacidad
            $sql = "SELECT asignaciones.disponibilidad_id
                FROM asignaciones
                WHERE asignaciones.semana = $semana
                AND asignaciones.planificacion_id IN (SELECT planificacions.id FROM planificacions WHERE planificacions.asignaturas_id = $asignaturas_id
                                                      AND planificacions.profesores_id IS NULL)
                AND asignaciones.disponibilidad_id IN (SELECT disponibilidad.id FROM disponibilidad WHERE disponibilidad.dia = $dia AND disponibilidad.turno = $turno
                                                       AND disponibilidad.locales_id IN (SELECT locales.id FROM locales WHERE locales.tipo_de_locales_id = 1))
                GROUP BY asignaciones.disponibilidad_id
                HAVING COUNT(asignaciones.disponibilidad_id) < 2
                LIMIT 1";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $disp = $result->fetch_assoc()['disponibilidad_id'];
                relacionar($disp, $p['id'], $anno, $semana, $conn);
            } else {
                // slicitar disponibilidad libre
                $select_disp = "SELECT disponibilidad.id FROM disponibilidad WHERE disponibilidad.dia = $dia AND disponibilidad.turno = $turno
                    AND disponibilidad.locales_id IN (SELECT locales.id FROM locales WHERE locales.tipo_de_locales_id = 1)
                    AND disponibilidad.id NOT IN (SELECT asignaciones.disponibilidad_id FROM asignaciones WHERE asignaciones.semana = $semana) LIMIT 1";

                $result = $conn->query($select_disp);

                if ($result->num_rows > 0) {
                    $disp = $result->fetch_assoc()['id'];
                    relacionar($disp, $p['id'], $anno, $semana, $conn);
                } else {

                    $select_asig = "SELECT asignaciones.*
                        FROM asignaciones
                        WHERE asignaciones.semana = $semana
                        AND asignaciones.disponibilidad_id IN (SELECT disponibilidad.id
                                                               FROM disponibilidad
                                                               WHERE disponibilidad.dia = $dia
                                                               AND disponibilidad.turno = $turno
                                                               AND disponibilidad.locales_id IN (SELECT locales.id
                                                                                                 FROM locales
                                                                                                 WHERE locales.tipo_de_locales_id = 1))
                                                                                                 AND asignaciones.planificacion_id NOT IN (SELECT planificacions.id
                                                                                                                                           FROM planificacions
                                                                                                                                           WHERE planificacions.profesores_id IS NULL)
                                                                                                                                           LIMIT 1";
                    $result_asig = $conn->query($select_asig);
                    $a = $result_asig->fetch_assoc();

                    relacionar($a['disponibilidad_id'], $p['id'], $anno, $semana, $conn);

                    $select_planif = "SELECT planificacions.* FROM planificacions WHERE planificacions.id = " . $a['planificacion_id'] . "";
                    $result_planif = $conn->query($select_planif);
                    $planif = $result_planif->fetch_assoc();

                    $tc = 'C';
                    $disponibilidad = devolver_locales($planif['asignaturas_id'], $seccion, $tc, $a['disponibilidad_id'], $conn);


                    //recorriendo locales disponibles para asignar un local disponible a cada planificación
                    foreach ($disponibilidad as $ld) {

                        //comprobar si disponibilidad actual no esta ocupada
                        if (!ocupada($planif['id'], $ld['id'], $planif['asignaturas_id'], $tc, $semana, $anno, $conn)) {

                            //echo ocupada($a['planif_id'], $ld['id'], $id_asig, $tc, $disp_afect, $conn)."<br>";
                            //comprobar que no se imparta más de 1 turno de la misma asignatura el mismo dia al mismo grupo
                            //comprobar que un mismo grupo no este en varios locales el mismo dia y el mismo turno
                            //comprobar que un profesor no este el mismo dia y el mismo turno en más de 1 local a la vez
                            // $sql3 = "SELECT p.grupos_id FROM profesores as p WHERE p.user_id = '$profesor_afectado_id'";

                            if (!comprobar(
                                $planif['asignaturas_id'],
                                $planif['grupos_id'],
                                $planif['profesores_id'],
                                $ld,
                                $a['disponibilidad_id'],
                                $turno,
                                $semana,
                                $anno,
                                $conn
                            )) {
                                //relacionar disponibilidad con planificacion en relaciones
                                relacionar($ld['id'], $planif['id'], $anno, $semana, $conn);

                                break;
                            }
                        }
                    }
                    $delete_asig = "DELETE FROM asignaciones WHERE asignaciones.id = " . $a['id'] . "";
                    $conn->query($delete_asig);
                }
            }
        }

        insert_pp($asignaturas_id, $semestre, $anno, $semana, $dia, $turno, $conn);
    } else {

        foreach ($planif as $p) {
            // comprobar que exista algun salon con disponibilidad para que otro grupo haga su parcial ahi
            $sql = "SELECT asignaciones.disponibilidad_id
            FROM asignaciones
            WHERE asignaciones.semana = $semana
            AND asignaciones.disponibilidad_id IN (SELECT disponibilidad.id FROM disponibilidad WHERE disponibilidad.dia = $dia AND disponibilidad.turno = $turno
                                                    AND disponibilidad.locales_id IN (SELECT locales.id FROM locales WHERE locales.tipo_de_locales_id = 1))
            GROUP BY asignaciones.disponibilidad_id
            HAVING COUNT(asignaciones.disponibilidad_id) < 2
            LIMIT 1";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $disp  = $result->fetch_assoc()['disponibilidad_id'];
            } else {
                $sql2 = "SELECT disponibilidad.id FROM disponibilidad WHERE disponibilidad.dia = $dia AND disponibilidad.turno = $turno
                AND disponibilidad.locales_id IN (SELECT locales.id FROM locales WHERE locales.tipo_de_locales_id = 1)
                AND disponibilidad.id NOT IN (SELECT asignaciones.disponibilidad_id FROM asignaciones WHERE asignaciones.semana = $semana) LIMIT 1";
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {
                    $disp  = $result2->fetch_assoc()['id'];
                }
            }

            relacionar($disp, $p['id'], $anno, $semana, $conn);
            // $p_id = $p['id'];

            // $insert_asig = "INSERT INTO asignaciones(disponibilidad_id, planificacion_id, anno, semana, estado) VALUES ('$disp','$p_id','$anno','$semana','1')";
            // $conn->query($insert_asig);
        }

        insert_pp($asignaturas_id, $semestre, $anno, $semana, $dia, $turno, $conn);
    }
}


function insert_pp($asignaturas_id, $semestre, $anno, $semana, $dia, $turno, $conn)
{

    $insert_pp = "INSERT INTO pruebasparciales (asignaturas_id, anno, semestre, dia, turno, semana)
        VALUES ('$asignaturas_id','$anno','$semestre','$dia','$turno', '$semana')";

    $conn->query($insert_pp);

    header("Location: http://127.0.0.1:8000/admin/parciales");
    die();
}

// function update_pp($asignaturas_id, $semestre, $anno, $semana, $dia, $turno, $conn)
// {

//     $update_pp = "UPDATE pruebasparciales SET asignaturas_id = $asignaturas_id
//     WHERE pruebasparciales.anno = $anno
//     AND pruebasparciales.semestre = $semestre
//     AND pruebasparciales.dia = $dia
//     AND pruebasparciales.turno = $turno
//     AND pruebasparciales.semana = $semana";

//     $conn->query($update_pp);

//     header("Location: http://127.0.0.1:8000/admin/parciales");
//     die();
// }
// function check_bc_isGenenated($id_asig, $tc, $anno, $semana, $conn)
// {

//     $sql = " SELECT * FROM asignaciones
//     WHERE anno=$anno AND semana=$semana AND planificacion_id IN (SELECT id
//                                                                     FROM planificacions
//                                                                     WHERE asignaturas_id = $id_asig
//                                                                     AND profesores_id IN (SELECT user_id
//                                                                                             FROM profesores
//                                                                                             WHERE profesores.tipo_de_clases LIKE '$tc'
//                                                                                             OR profesores.tipo_de_clases LIKE '%,$tc'
//                                                                                             OR profesores.tipo_de_clases LIKE '$tc,%'
//                                                                                             OR profesores.tipo_de_clases LIKE '%,$tc,%'))
//     ";

//     // SELECT *
//     // FROM profesores
//     // WHERE profesores.tipo_de_clases LIKE 'C'
//     // OR profesores.tipo_de_clases LIKE '%,C'
//     // OR profesores.tipo_de_clases LIKE 'C,%'
//     // OR profesores.tipo_de_clases LIKE '%,C,%'

//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         return false;
//     } else {
//         return true;
//     }
// }

//funcion que devuelve las planificaciones
// function devolver_planif($bc_id_asig, $tc, $conn)
// {
//     $planificaciones = array();

//     $sql = "SELECT planificacions.*
//                 FROM planificacions
//                 WHERE planificacions.asignaturas_id = '$bc_id_asig'
//                 AND planificacions.profesores_id IN (SELECT user_id
//                                                      FROM profesores
//                                                      WHERE profesores.tipo_de_clases LIKE '$tc'
//                                                      OR profesores.tipo_de_clases LIKE '%,$tc'
//                                                      OR profesores.tipo_de_clases LIKE '$tc,%'
//                                                      OR profesores.tipo_de_clases LIKE '%,$tc,%')";

//     $result = $conn->query($sql);
//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             array_push($planificaciones, array("id" => intval($row['id']), "id_asig" => intval($row['asignaturas_id']), "id_grupo" => intval($row['grupos_id']), "id_prof" => intval($row['profesores_id'])));
//         }
//     }
//     return $planificaciones;
// }


function devolver_locales($id_asig, $seccion, $tc, $disp_afect, $conn)
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
            AND disponibilidad.id NOT IN ($disp_afect)
            AND disponibilidad.locales_id IN (SELECT locales.id
                                                FROM locales
                                                WHERE locales.tipo_de_locales_id = (SELECT id FROM tipo_de_locales WHERE tipo = '$tipo_de_local'))
                                                ORDER BY disponibilidad.dia, disponibilidad.turno";
        } else {
            $sql = "SELECT *
            FROM disponibilidad
            WHERE turno NOT IN ('4','5','6')
            AND disponibilidad.id NOT IN ($disp_afect)
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
            AND disponibilidad.id NOT IN ($disp_afect)
            AND disponibilidad.locales_id IN (SELECT locales.id
                                                FROM locales
                                                WHERE locales.tipo_de_locales_id = (SELECT id FROM tipo_de_locales WHERE tipo = '$tipo_de_local'))
                                                ORDER BY disponibilidad.dia, disponibilidad.turno";
        } else {
            $sql = "SELECT *
            FROM disponibilidad
            WHERE turno NOT IN ('1','2','3')
            AND disponibilidad.id NOT IN ($disp_afect)
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


function ocupada($id_planif, $id_disp, $id_asig, $tc, $semana, $anno, $conn)
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


    $sql = "SELECT disponibilidad.id
    FROM disponibilidad
    WHERE disponibilidad.id NOT IN (SELECT asignaciones.disponibilidad_id
                                        FROM asignaciones WHERE asignaciones.semana = '$semana')
                                        AND disponibilidad.locales_id IN (SELECT locales.id
                                                                            FROM locales
                                                                            WHERE locales.tipo_de_locales_id = (SELECT id FROM tipo_de_locales WHERE tipo = '$tipo_de_local'))
    ";
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
                                                        AND asignaciones.anno = '$anno' AND asignaciones.semana = '$semana'
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


function comprobar($id_asig, $id_grupo, $id_prof, $ld, $disp_afect, $turno, $semana, $anno, $conn)
{

    $cond_turno = !$turno ? "" : "AND disponibilidad.id NOT IN ($disp_afect)";
    //comprobar que no se imparta más de 1 turno de la misma asignatura el mismo dia al mismo grupo
    $sql = "SELECT disponibilidad.dia
    FROM disponibilidad
    WHERE disponibilidad.id IN (SELECT asignaciones.disponibilidad_id
                                    FROM asignaciones
                                    WHERE planificacion_id IN (SELECT planificacions.id
                                                        FROM planificacions
                                                        WHERE planificacions.asignaturas_id = '$id_asig'
                                                        AND planificacions.grupos_id = '$id_grupo')
                                                        AND asignaciones.anno = '$anno' AND asignaciones.semana = '$semana')
                                                        $cond_turno
                                                        ORDER BY disponibilidad.dia DESC
                                                        LIMIT 1
";
    //comprobar que un mismo grupo no este en varios locales el mismo dia y el mismo turno
    $sql1 = "SELECT disponibilidad.id
                            FROM disponibilidad
                            WHERE disponibilidad.dia = " . $ld['dia'] . "
                            AND disponibilidad.turno = " . $ld['turno'] . "
                            AND disponibilidad.id IN (SELECT asignaciones.disponibilidad_id
                                                            FROM asignaciones
                                                            WHERE planificacion_id IN (SELECT planificacions.id
                                                                                FROM planificacions
                                                                                WHERE planificacions.grupos_id = '$id_grupo')
                                                                                AND asignaciones.anno = '$anno' AND asignaciones.semana = '$semana')
";

    //comprobar que un profesor no este el mismo dia y el mismo turno en más de 1 local a la vez
    $sql2 = "SELECT disponibilidad.id
                            FROM disponibilidad
                            WHERE disponibilidad.dia = " . $ld['dia'] . "
                            AND disponibilidad.turno = " . $ld['turno'] . "
                            AND disponibilidad.id IN (SELECT asignaciones.disponibilidad_id
                                                            FROM asignaciones
                                                            WHERE planificacion_id IN (SELECT planificacions.id
                                                                                FROM planificacions
                                                                                WHERE planificacions.profesores_id = '$id_prof')
                                                                                AND asignaciones.anno = '$anno' AND asignaciones.semana = '$semana')
";


    $sql3 = "SELECT " . $ld['id'] . " IN ($disp_afect)";

    $result3 = $conn->query($sql3);
    $disp_id = $result3->fetch_array()['0'];

    // //comprobar que un profesor no este afcetado ese turno de ese dia de esa semana de ese anno
    //     $sql3 = "SELECT a.id FROM afectaciones as a
    //             WHERE a.profesores_afectados_id = '$id_prof'
    //             AND a.dia = '$dia'
    //             AND a.semana ='$semana'
    //             AND a.turno ='$turno'
    //             AND a.anno='$anno'
    // ";
    //     //comprobar que un profesor no este afcetado ese dia de esa semana de ese anno
    //     $sql4 = "SELECT a.id FROM afectaciones as a
    // WHERE a.profesores_afectados_id = '$id_prof'
    // AND a.dia = '$dia'
    // AND a.semana ='$semana'
    // AND a.anno='$anno'
    // ";



    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);
    // if ($turno) {
    //     $result3 = $conn->query($sql3);
    // } else {
    //     $result3 = $conn->query($sql4);
    // }

    $dia2 = $result->fetch_assoc();

    if ($dia2 == null) {
        $value = 1;
    } else {
        $value = $ld['dia'] - $dia2['dia'];
    }

    if (($value <= 0) || ($result1->num_rows > 0) || ($result2->num_rows > 0) || ($disp_id > 0)) {
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
function redirect($link, $msg)
{
    header("Location: http://127.0.0.1:8000/admin/" . $link . "?msg=" . $msg . "");
    die();
}