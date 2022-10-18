<?php
include('conexion.php');


$sql = "SELECT * FROM asignaturas ";
$result = $conn->query($sql);

$asignaturas = array();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($asignaturas, array("id" => $row["id"]));
    }
}

$sql = "SELECT * FROM tipo_de_clases ";
$result = $conn->query($sql);

$tipo_de_clases = array();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($tipo_de_clases, array("id" => $row["id"], "tipo" => $row["tipo"]));
    }
}

$id = 1;
foreach ($asignaturas as $a) {
    $id_asig = $a['id'];
    foreach ($tipo_de_clases as $tc) {
        $nombre = 'prof_' . $tc['tipo'];
        $tipo_de_clase = $tc['id'];
        $sql = "INSERT INTO profesores(id, nombre, tipo_de_clase, id_asig) 
            VALUES ($id,'$nombre',$tipo_de_clase,$id_asig)";
        $conn->query($sql);
        $id++;
    }
}
