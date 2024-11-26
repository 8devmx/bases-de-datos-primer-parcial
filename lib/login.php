<?php
$emailUser = $_POST["correo"];
$passwordUser = $_POST["password"];

require_once "db.php";

$consulta = "SELECT * FROM usuarios WHERE correo='$emailUser' AND password='$passwordUser'  AND status = 1";
$resultado = mysqli_query($enlace, $consulta);
$totalUsers = mysqli_num_rows($resultado);


if ($totalUsers == 0) {
    echo "Usuario no encontrado o está desactivado. Por favor, contacte al administrador.";
    exit(); 
    header("Location: ../");
} else {
    $registro = mysqli_fetch_object($resultado);
    session_start();
    $_SESSION["nombre"] = $registro->nombre;
    $_SESSION["correo"] = $registro->correo;
    $_SESSION["id"] = $registro->id;
    $_SESSION["rol"] = $registro->rol;
    header("Location: ../modules/gastos/");
}

?>
