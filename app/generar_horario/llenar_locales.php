<?php
include('conexion.php');

$sql = "SELECT * FROM tipo_de_locales ";
$result = $conn->query($sql);
$tipo_de_locales = array();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($tipo_de_locales, array("id" => $row["id"], "local" => $row["tipo"]));
    }
}

$id = 1;
foreach ($tipo_de_locales as $tl) {
    if ($tl['tipo'] == 'Salon') {
        $tipo = $tl['id'];
        for ($i = 1; $i < 6; $i++) {
            $local = '40' . $i;
            $sql = "INSERT INTO locales(id,tipo_de_locales_id, local, disponibilidad)
            VALUES ($id,$local,$tipo,1)";
            $conn->query($sql);
            $id++;
        }
    }
    if ($tl['tipo'] == 'Aula') {
        $tipo = $tl['id'];
        for ($i = 1; $i < 9; $i++) {
            $local1 = '20' . $i;
            $local2 = '30' . $i;
            $sql1 = "INSERT INTO locales(id, tipo_de_locales_id, local, disponibilidad)
                VALUES ($id,$local1,$tipo,1)";
            $conn->query($sql1);
            $id++;

            $sql2 = "INSERT INTO locales(id, tipo_de_locales_id, local, disponibilidad)
                VALUES ($id,$local2,$tipo,1)";
            $conn->query($sql2);
            $id++;
        }
    }
    if ($tl['tipo'] == 'Laboratorio') {
        $tipo = $tl['id'];
        for ($i = 1; $i < 9; $i++) {
            $local1 = '20' . $i;
            $local2 = '30' . $i;
            $sql1 = "INSERT INTO locales(id, tipo_de_locales_id, local, disponibilidad)
                VALUES ($id,$local1,$tipo,1)";
            $conn->query($sql1);
            $id++;

            $sql2 = "INSERT INTO locales(id, tipo_de_locales_id, local, disponibilidad)
                VALUES ($id,$local2,$tipo,1)";
            $conn->query($sql2);
            $id++;
        }
    }
    if ($tl['tipo'] == 'Deporte') {
        $tipo = $tl['id'];
        $sql = "INSERT INTO locales(id, tipo_de_locales_id, local, disponibilidad)
        VALUES ($id,'cancha',$tipo,1)";
        $conn->query($sql);
        $id++;
    }
}
