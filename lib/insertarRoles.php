<?php 
    require_once 'db.php';
    extract($_POST);
    $consulta = "INSERT INTO roles (nombre, status) VALUES ('$nombreRoles','$statusRoles')";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/roles/index.php");
?>
