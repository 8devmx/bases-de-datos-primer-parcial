<?php 
require_once 'db.php';
$consulta = "ALTER TABLE categorias ADD UNIQUE (nombre)";
mysqli_query($enlace, $consulta);

extract($_POST);
$consulta = "INSERT IGNORE INTO categorias (nombre) VALUES ('$categoriaUsuario')";
mysqli_query($enlace, $consulta);
header("Location: ../modules/categorias");
