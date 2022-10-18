<?php
include('conexion.php');

$sql = "SELECT id FROM asignaturas";
$asignaturas = $conn->query($sql);

$sql2 = "SELECT id FROM grupos WHERE anno = 1";
$grupos = $conn->query($sql);

$sql3 = "SELECT id FROM profesores";
$profesores = $conn->query($sql);

$id = 1;

foreach ($asignaturas as $a) {
    foreach ($grupos as $g) {
        foreach ($profesores as $p) {
            $asig = $a["id"];
            $grup = $g["id"];
            $prof = $p["id"];
            $sql = "INSERT INTO planificacions (id, asignaturas_id, grupos_id, profesores_id)VALUES ($id, $asig, $grup, $prof)";
            $conn->query($sql);
            $id++;
        }
    }
}
