<?php 

    require_once 'db.php';
    $consulta = "ALTER TABLE gastos ADD UNIQUE (descripcion)";
    mysqli_query($enlace, $consulta);

    extract($_POST);
    $consulta = "UPDATE IGNORE gastos SET descripcion = '$descripcionGastos', fecha = '$fechaGastos', cantidad = '$cantidadGastos', categoria = '$categoria', tipo = '$tipo', usuario = '$usuario' WHERE id = '$idGastos'";
    mysqli_query($enlace, $consulta);
    header("Location: ../modules/gastos/index.php");
?>