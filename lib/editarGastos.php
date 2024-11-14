<?php 

    require_once 'db.php';

    extract($_POST);
    $consulta = "UPDATE gastos SET descripcion = '$descripcionGastos', cantidad = '$cantidadGastos', categoria = '$categoria', tipo = '$tipo', usuario = '$usuario' WHERE id = '$idGastos'";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/gastos/index.php");
?>
