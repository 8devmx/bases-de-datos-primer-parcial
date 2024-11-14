<?php 
    require_once 'db.php';
    extract($_POST);
    $consulta = "INSERT INTO tipos (nombre, color, status) VALUES ('$nombreTipos','$colorTipo','$statusTipos')";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/tipos/index.php");
?>
