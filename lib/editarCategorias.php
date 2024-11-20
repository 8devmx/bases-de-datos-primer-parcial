<?php 
    require_once 'db.php';
    extract($_POST);
    $colorSinHash = ltrim($colorCategoria, '#');
    $consulta = "UPDATE categorias SET nombre = '$nombreCategorias', status = '$statusCategorias', color = '$colorSinHash' WHERE id = '$idCategorias'";    
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/categorias/index.php");
?>