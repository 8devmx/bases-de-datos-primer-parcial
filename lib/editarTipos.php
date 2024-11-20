<?php 
    require_once 'db.php';
    extract($_POST);
    $colorSinHash = ltrim($colorTipo, '#');
    $consulta = "UPDATE tipos SET nombre = '$nombreTipos', color = '$colorSinHash', status = '$statusTipos' WHERE id = '$idTipos'";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/tipos/index.php");
?>