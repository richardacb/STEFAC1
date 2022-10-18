<?php
include('conexion.php');


for ($i = 1; $i < 7; $i++) {
    $name = 'IDF110'.$i;
    $sql = "INSERT INTO grupos(id, name, anno)
    VALUES ($i,'$name',1)";

    $conn->query($sql);

    $name1 = 'IDF120'.$i;
   $sql1 = "INSERT INTO grupos(id, name, anno)
    VALUES ($i+6,'$name1',2)";

    $conn->query($sql1);
   $name2 = 'IDF130'.$i;
    $sql2 = "INSERT INTO grupos(id, name, anno)
    VALUES ($i+12,'$name2',3)";

    $conn->query($sql2);
   $name3 = 'IDF140'.$i;
    $sql3 = "INSERT INTO grupos(id, name, anno)
    VALUES ($i+18,'$name3',4)";

    $conn->query($sql3);
   $name4 = 'IDF150'.$i;
    $sql4 = "INSERT INTO grupos(id, name, anno)
    VALUES ($i+24,'$name4',5)";

    $conn->query($sql4);
}
