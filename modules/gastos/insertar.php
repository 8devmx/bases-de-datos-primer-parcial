<?php
    require_once '../../lib/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../lib/head.php'; ?>
    <title>Gastos</title>
</head>
<body class="d-flex flex-nowrap">
    <?php
        session_start();
        if (!isset($_SESSION["correo"])) {
            header("Location: ../../index.php");
            exit();
        }
        include_once '../../lib/sidebar.php';
    ?>
    <section class="p-3 w-100">
        <h1>Gastos</h1>
        <form method="POST" action="../../lib/insertarGastos.php">
            <div class="form-group mb-3">
                <label>Descripción:</label>
                <input type="text" class="form-control" name="descripcionGastos" id="descripcionGastos">
            </div>
            <div class="form-group mb-3">
                <label>Fecha:</label>
                <input type="text" class="form-control" name="fechaGastos" id="fechaGastos">
            </div>
            <div class="form-group mb-3">
                <label>Cantidad:</label>
                <input type="text" class="form-control" name="cantidadGastos" id="cantidadGastos">
            </div>
            <div class="form-group mb-3">
                <label>Categoría:</label>
                <input type="text" class="form-control" name="categoria" id="categoria">
            </div>
            <div class="form-group mb-3">
                <label>Tipo:</label>
                <input type="text" class="form-control" name="tipo" id="tipo">
            </div>
            <div class="form-group mb-3">
                <label>Usuario:</label>
                <input type="text" class="form-control" name="usuario" id="usuario">
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            <hr>
        </form>
    </section>
    </body>
    </html>
    