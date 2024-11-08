<?php
require_once 'db.php';
extract($_POST);
$consulta = "UPDATE IGNORE usuarios SET nombre = '$nombreUsuario', telefono = '$telefonoUsuario', correo = '$correoUsuario', password = '$passwordUsuario', status = '$statusUsuario' WHERE id = '$idUsuario'";
mysqli_query($enlace, $consulta);
header("Location: ../modules/usuarios/index.php");
