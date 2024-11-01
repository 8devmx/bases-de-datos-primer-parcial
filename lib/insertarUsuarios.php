<?php
extract($_POST);
require_once 'db.php';
$consulta = "INSERT INTO usuarios (nombre, telefono, correo, password, status) VALUES ('$nombreUsuario','$telefonoUsuario','$correoUsuario','$passwordUsuario','$statusUsuario')";
mysqli_query($enlace, $consulta);
header("Location: ../modules/usuarios");
