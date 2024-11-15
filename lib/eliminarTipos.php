<?php 
    require_once 'db.php';

    extract($_GET);
    $consulta = "DELETE FROM tipos WHERE id = $id";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/tipos/index.php");
?>
