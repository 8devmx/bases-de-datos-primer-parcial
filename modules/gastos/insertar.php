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
                <label>Cantidad:</label>
                <input type="text" class="form-control" name="cantidadGastos" id="cantidadGastos">
            </div>
            <?php
            $consultaCategoria = "SELECT id, nombre FROM categorias";
            $resultadoCategoria = mysqli_query($enlace, $consultaCategoria);
            ?>
            <div class="form-group mb-3">
                <label>Categoría:</label>
                <select name="categoria" id="categoriaGastos" class="form-control">
                    <?php
                    while ($categoria = mysqli_fetch_object($resultadoCategoria)) {
                        echo '<option value="' . $categoria->id . '" ' . ($categoria->id == $registro->categoria ? 'selected' : '') . '>' . $categoria->nombre . '</option>';
                    }
                    ?>
                </select>
            </div>
            <?php
            $consultaTipo = "SELECT id, nombre FROM tipos";
            $resultadoTipo = mysqli_query($enlace, $consultaTipo);
            ?>
            <div class="form-group mb-3">
                <label>Tipo:</label>
                <select name="tipo" id="tipoGastos" class="form-control">
                    <?php
                    while ($tipo = mysqli_fetch_object($resultadoTipo)) {
                        echo '<option value="' . $tipo->id . '" ' . ($tipo->id == $registro->tipo ? 'selected' : '') . '>' . $tipo->nombre . '</option>';
                    }
                    ?>
                </select>
            </div>
            <?php
            $consultaUsuario = "SELECT id, nombre FROM usuarios";
            $resultadoUsuario = mysqli_query($enlace, $consultaUsuario);
            ?>
            <div class="form-group mb-3">
                <label>Usuario:</label>
                <select name="usuario" id="usuarioGastos" class="form-control">
                    <?php
                    while ($usuario = mysqli_fetch_object($resultadoUsuario)) {
                        echo '<option value="' . $usuario->id . '" ' . ($usuario->id == $registro->usuario ? 'selected' : '') . '>' . $usuario->nombre . '</option>';
                    }
                    ?>
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
