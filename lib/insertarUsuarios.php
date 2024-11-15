<?php 
    require_once 'db.php';

    extract($_POST);
    $consulta = "INSERT INTO usuarios (nombre, telefono, correo, password, rol, status) VALUES ('$nombreUsuario','$telefonoUsuario','$correoUsuario','$passwordUsuario','$rol','$statusUsuario')";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/usuarios/index.php");
?>
