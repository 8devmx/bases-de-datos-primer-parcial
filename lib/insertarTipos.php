<?php 
    require_once 'db.php';
    extract($_POST);
    $colorSinHash = ltrim($colorTipo, '#');
    $consulta = "INSERT INTO tipos (nombre, color, status) VALUES ('$nombreTipos','$colorSinHash','$statusTipos')";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/tipos/index.php");
?>
