<?php 
    require_once 'db.php';
    $consulta = "ALTER TABLE gastos ADD UNIQUE (descripcion)";
    mysqli_query($enlace, $consulta);

    extract($_POST);
    $consulta = "INSERT IGNORE INTO gastos (descripcion, fecha, cantidad, categoria, tipo, usuario) VALUES ('$descripcionGastos','$fechaGastos','$cantidadGastos','$categoria','$tipo','$usuario')";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/gastos/index.php");
?>