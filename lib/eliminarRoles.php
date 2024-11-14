<?php 
    require_once 'db.php';

    extract($_GET);
    $consulta = "DELETE FROM roles WHERE id = $id";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/roles/index.php");
?>
