<?php 
    require_once 'db.php';
    extract($_POST);
    $consulta = "INSERT INTO gastos (descripcion, cantidad, categoria, tipo, usuario) VALUES ('$descripcionGastos','$cantidadGastos','$categoria','$tipo','$usuario')";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/gastos/index.php");
?>
