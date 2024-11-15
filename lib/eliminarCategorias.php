<?php 
    require_once 'db.php';

    extract($_GET);
    $consulta = "DELETE FROM categorias WHERE id = $id";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/categorias/index.php");
?>
