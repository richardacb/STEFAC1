<?php
include('conexion.php');

$sql = "SELECT locales.id FROM locales";
$result = $conn->query($sql);

$locales = array();

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        array_push($locales, array("id" => $row["id"]));
    }
}
$id = 1;
for ($dia = 1; $dia < 6; $dia++) {
    for ($turno = 1; $turno < 7; $turno++) {
        foreach ($locales as $l) {
            $local = $l["id"];
            $sql = "INSERT INTO disponibilidad (id, locales_id, dia, turno)VALUES ($id, $local, $dia, $turno)";
            $conn->query($sql);
            $id++;
        }
    }
}
