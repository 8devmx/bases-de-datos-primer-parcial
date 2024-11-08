<?php 
    require_once 'db.php';
    $consulta = "ALTER TABLE usuarios ADD UNIQUE (correo)";
    mysqli_query($enlace, $consulta);

    extract($_POST);
    $consulta = "UPDATE IGNORE usuarios SET nombre = '$nombreUsuario', telefono = '$telefonoUsuario', correo = '$correoUsuario', password = '$passwordUsuario', status = '$statusUsuario' WHERE id = '$idUsuario'";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/usuarios/index.php");
?>