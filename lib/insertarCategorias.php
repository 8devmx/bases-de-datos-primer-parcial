<?php 
    require_once 'db.php';
    extract($_POST);
    $consulta = "INSERT INTO categorias (nombre, status, color, usuario) VALUES ('$nombreCategorias', '$statusCategorias', '$colorSinHash','$usuario')";    
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/categorias/index.php");
?>
