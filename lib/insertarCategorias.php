<?php 
    require_once 'db.php';
    extract($_POST);
    $colorSinHash = ltrim($colorCategoria, '#');
    $consulta = "INSERT INTO categorias (nombre, status, color) VALUES ('$nombreCategorias', '$statusCategorias', '$colorSinHash')";    
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/categorias/index.php");
?>
