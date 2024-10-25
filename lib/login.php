<?php
$emailUser = $_POST["correo"];
$passwordUser = $_POST["password"];

require_once 'db.php';

$consulta = "select * from usuarios where correo = '$emailUser' and password= '$passwordUser'";
$resultado = mysqli_query($enlace, $consulta);
$totalUsers = mysqli_num_rows($resultado);
if ($totalUsers == 0) {
  header("Location: ../");
} else {
  $registro = mysqli_fetch_object($resultado);
  session_start();
  $_SESSION["nombre"] = $registro->nombre;
  $_SESSION["correo"] = $registro->correo;
  header("Location: ../modules/usuarios/");
}
