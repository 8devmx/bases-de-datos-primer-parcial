<?php 
    require_once 'db.php';
    extract($_POST);
    $consulta = "UPDATE usuarios SET nombre = '$nombreUsuario', telefono = '$telefonoUsuario', correo = '$correoUsuario', password = '$passwordUsuario', rol = '$rol', status = '$statusUsuario' WHERE id = '$idUsuario'";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/usuarios/index.php");
?>
