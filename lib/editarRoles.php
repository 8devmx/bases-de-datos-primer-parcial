<?php 

    require_once 'db.php';

    extract($_POST);
    $consulta = "UPDATE roles SET nombre = '$nombreRoles', status = '$statusRoles' WHERE id = '$idRoles'";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/roles/index.php");
?>
