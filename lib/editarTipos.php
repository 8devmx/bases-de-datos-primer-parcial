<?php
require_once 'db.php';
$consulta = "ALTER TABLE tipos ADD UNIQUE (nombre)";
mysqli_query($enlace, $consulta);

extract($_POST);
$consulta = "UPDATE IGNORE tipos SET nombre = '$nombreTipos' WHERE id = '$idTipos'";
mysqli_query($enlace, $consulta);
header("Location: ../modules/tipos/index.php");

?>