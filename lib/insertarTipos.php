<?php
require_once 'db.php';
$consulta = "ALTER TABLE tipos ADD UNIQUE (nombre)";
mysqli_query($enlace, $consulta);

extract($_POST);
$consulta = "INSERT IGNORE INTO tipos (nombre) VALUES ('$nombreTipos')";
mysqli_query($enlace, $consulta);
header("Location: ../modules/tipos/index.php");

?>