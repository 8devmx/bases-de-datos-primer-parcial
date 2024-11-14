<?php 

    require_once 'db.php';

    extract($_POST);
    $consulta = "UPDATE tipos SET nombre = '$nombreTipos', color = '$colorTipo', status = '$statusTipos' WHERE id = '$idTipos'";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/tipos/index.php");
?>
