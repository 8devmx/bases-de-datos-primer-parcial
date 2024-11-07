<?php 
require_once 'db.php';
$consulta = "ALTER TABLE categorias ADD UNIQUE (nombre)";

extract($_POST);
$consulta = "UPDATE IGNORE categorias SET nombre = '$categoriaUsuario' WHERE id = '$idCategoria'";
mysqli_query($enlace, $consulta);
header("Location: ../modules/categorias/index.php");
