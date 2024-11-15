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
        <form method="POST" action="../../lib/editarGastos.php">
            <?php
                $id = $_GET['id'];
                $consulta = "SELECT g.id, g.descripcion, g.creacion, g.modificacion, g.cantidad, g.categoria as categoria_id, g.tipo as tipo_id, g.usuario as usuario_id, u.nombre as usuario_nombre, t.nombre as tipo_nombre, c.nombre as categoria_nombre FROM gastos g JOIN usuarios u ON g.usuario = u.id JOIN tipos t ON g.tipo = t.id JOIN categorias c ON g.categoria = c.id WHERE g.id = $id";
                $resultado = mysqli_query($enlace, $consulta);
                $registro =  mysqli_fetch_object($resultado);
            ?>
            <div class="form-group mb-3">
                <label>Descripción:</label>
                <input type="text" value="<?php echo $registro->descripcion; ?>" class="form-control" name="descripcionGastos" id="descripcionGastos">
            </div>
            <div class="form-group mb-3">
                <label>Cantidad:</label>
                <input type="text" value="<?php echo $registro->cantidad; ?>" class="form-control" name="cantidadGastos" id="cantidadGastos">
            </div>
            <div class="form-group mb-3">
                <label>Categoría:</label>
                <input type="text" value="<?php echo $registro->categoria_id; ?>" class="form-control" name="categoria" id="categoria">
            </div>
            <div class="form-group mb-3">
                <label>Tipo:</label>
                <input type="text" value="<?php echo $registro->tipo_id; ?>" class="form-control" name="tipo" id="tipo">
            </div>
            <div class="form-group mb-3">
                <label>Usuario:</label>
                <input type="text" value="<?php echo $registro->usuario_id; ?>" class="form-control" name="usuario" id="usuario">
            </div>
            <div class="form-group mb-3">
                <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="idGastos" id="idGastos">
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
            <hr>
        </form>
    </section>
    </body>
    </html>
