<?php
require_once 'db.php';
extract($_GET);
$consulta = "DELETE FROM usuarios WHERE id = $id";
mysqli_query($enlace, $consulta);
header("Location: ../modules/usuarios/index.php");
