<?php
    require_once '../../lib/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../lib/head.php'; ?>
    <title>Tipos</title>
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
        <h1>Tipos</h1>
        <form method="POST" action="../../lib/insertarTipos.php">
            <div class="form-group mb-3">
                <label>Nombre:</label>
                <input type="text" class="form-control" name="nombreTipos" id="nombreTipos">
            </div>
            <div class="form-group mb-3">
                <label>Selecciona Un Color:</label><br>
                <input type="color" name="colorTipo" value="#FFFFFF" style="min-width: 148px;">
            </div>
            <div class="form-group mb-3">
                <label>Status:</label>
                <select name="statusTipos" id="statusTipos" class="form-control">
                    <option value="1">Activado</option>
                    <option value="0">Desactivado</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            <hr>
        </form>
    </section>
</body>
</html>
