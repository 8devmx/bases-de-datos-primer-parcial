<?php 
    require_once 'db.php';

    extract($_GET);
    $consulta = "DELETE FROM gastos WHERE id = $id";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/gastos/index.php");
?>
