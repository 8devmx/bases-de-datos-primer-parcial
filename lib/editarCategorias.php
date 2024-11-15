<?php 
    require_once 'db.php';
    extract($_POST);
    $consulta = "UPDATE categorias SET nombre = '$nombreCategorias', status = '$statusCategorias', color = '$colorCategoria' WHERE id = '$idCategorias'";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/categorias/index.php");
?>
