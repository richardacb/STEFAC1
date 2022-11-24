<?php

include('conexion.php');


    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $anno = $_POST["anno"];
        $semana = $_POST["semana"];
        $grupo = $_POST["grupo"];


        buscar($anno, $semana, $grupo, $conn);
    }
    function buscar($anno, $semana, $grupo, $conn)
    {
        $g = array();
        $sql = "SELECT grupos.* FROM grupos WHERE name = '$grupo' AND anno = '$anno'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($g, array("id" => intval($row['id']), "nombre" => $row['name'], "anno" => intval($row['anno'])));
            }
        }
        publicar($g[0], $conn);
    }


    //funcion que publica el horario
    function publicar($grupo, $conn)
    {
        echo "
        <table style='width:100%; border-style: solid; border-width: 1px; text-align: center; border-collapse: collapse;'>
            <tr>
                <th style='border-style: solid; border-width: 1px; padding: 5px;' colspan='6'>" . $grupo['nombre'] . "</th>
            </tr>
            <tr>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'></td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>Lunes</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>Martes</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>Miércoles</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>Jueves</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>Viernes</td>
            </tr>
            <tr>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>1</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(1, 1, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(2, 1, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(3, 1, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(4, 1, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(5, 1, $grupo['id'], $conn) . "</td>
            </tr>
            <tr>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>2</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(1, 2, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(2, 2, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(3, 2, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(4, 2, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(5, 2, $grupo['id'], $conn) . "</td>
            </tr>
            <tr>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>3</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(1, 3, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(2, 3, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(3, 3, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(4, 3, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(5, 3, $grupo['id'], $conn) . "</td>
            </tr>
            <tr>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>4</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(1, 4, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(2, 4, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(3, 4, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(4, 4, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(5, 4, $grupo['id'], $conn) . "</td>
            </tr>
            <tr>
                <td style='border-style: solid ; border-width: 1px; padding: 5px;'>5</td>
                <td style='border-style: solid ; border-width: 1px; padding: 5px;'>" . colocar(1, 5, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid ; border-width: 1px; padding: 5px;'>" . colocar(2, 5, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid ; border-width: 1px; padding: 5px;'>" . colocar(3, 5, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid ; border-width: 1px; padding: 5px;'>" . colocar(4, 5, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid ; border-width: 1px; padding: 5px;'>" . colocar(5, 5, $grupo['id'], $conn) . "</td>
            </tr>
            <tr>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>6</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(1, 6, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(2, 6, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(3, 6, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(4, 6, $grupo['id'], $conn) . "</td>
                <td style='border-style: solid; border-width: 1px; padding: 5px;'>" . colocar(5, 6, $grupo['id'], $conn) . "</td>
            </tr>
        </table>
        ";
    }


    //funcion que coloca los datos en la tabla
    function colocar($dia, $truno, $id_grupo, $conn)
    {

        $sql = "SELECT asignaturas.nombre
            FROM asignaturas
            WHERE asignaturas.id IN (SELECT planificacions.asignaturas_id
                        FROM planificacions
                        WHERE planificacions.id IN (SELECT asignaciones.planificacion_id
                                                        FROM asignaciones
                                                        WHERE asignaciones.disponibilidad_id IN (SELECT disponibilidad.id
                                                                                    FROM disponibilidad
                                                                                    WHERE disponibilidad.dia = $dia
                                                                                    AND disponibilidad.turno = $truno
                                                                                    AND disponibilidad.id IN (SELECT asignaciones.disponibilidad_id
                                                                                                                    FROM asignaciones
                                                                                                                    WHERE asignaciones.planificacion_id IN (SELECT planificacions.id
                                                                                                                                                    FROM planificacions
                                                                                                                                                    WHERE planificacions.grupos_id = '$id_grupo')))))

    ";
        // filtrando el tipo de clase del turno de clase
        $sql1 = "SELECT locales.tipo_de_locales_id
                                                    FROM locales
                                                   WHERE locales.id IN (SELECT disponibilidad.locales_id
                                                                                                FROM disponibilidad
                                                                                                WHERE disponibilidad.dia = $dia
                                                                                                AND disponibilidad.turno = $truno
                                                                                                AND disponibilidad.id IN (SELECT asignaciones.disponibilidad_id
                                                                                                                                FROM asignaciones
                                                                                                                                WHERE asignaciones.planificacion_id IN (SELECT planificacions.id
                                                                                                                                                                FROM planificacions
                                                                                                                                                                WHERE planificacions.grupos_id = '$id_grupo')))



    ";

        $sql2 = "SELECT locales.*
            FROM locales
            WHERE locales.id IN (SELECT disponibilidad.locales_id
                                            FROM disponibilidad
                                            WHERE disponibilidad.dia = $dia
                                            AND disponibilidad.turno = $truno
                                            AND disponibilidad.id IN (SELECT asignaciones.disponibilidad_id
                                                                            FROM asignaciones
                                                                            WHERE asignaciones.planificacion_id IN (SELECT planificacions.id
                                                                                                            FROM planificacions
                                                                                                            WHERE planificacions.grupos_id = '$id_grupo')))
    ";

        $result = $conn->query($sql);
        $asig_nombre = $result->fetch_assoc();


        $result1 = $conn->query($sql1);
        $tipo_de_local_id = $result1->fetch_assoc();

        $result2 = $conn->query($sql2);


        $local = $result2->fetch_assoc();

        if (!empty($local['tipo_de_locales_id'])) {
            $tipo_de_local = $local['tipo_de_locales_id'];
            $sql3 = "SELECT tipo FROM tipo_de_locales WHERE id = $tipo_de_local";
            $result3 = $conn->query($sql3);
            $tipo = $result3->fetch_assoc()['tipo'];

            if ($tipo_de_local == 1) {
                $tipo_de_clase = 'C';
            }
            if ($tipo_de_local == 2) {
                $tipo_de_clase = 'CP';
            }
            if ($tipo_de_local == 3) {
                $tipo_de_clase = 'LAB';
            }
        }

        if (!empty($asig_nombre) && !empty($tipo_de_clase) && !empty($local['local']) && !empty($tipo)) {
            return $asig_nombre['nombre'] . "(" . $tipo_de_clase . ")" . $tipo . "-" . $local['local'];
        }
    }