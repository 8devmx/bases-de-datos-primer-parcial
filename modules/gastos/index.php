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
        header("Location: ../../lib/login.php");
        exit();
    }
    include_once '../../lib/sidebar.php';
    ?>
    <section class="p-3 w-100">
        <h1>Gastos</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Tipo</th>
                    <th>Categoría</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta = "SELECT g.id, g.descripcion, g.fecha, g.cantidad, u.nombre as usuario, t.nombre as tipo, c.nombre as categoria FROM gastos g join usuarios u on g.usuario = u.id join tipos t on g.tipo = t.id join categorias c on g.categoria = c.id";
                $resultado = mysqli_query($enlace, $consulta);
                while ($registro = mysqli_fetch_object($resultado)) {
                ?>
                    <tr>
                        <td><?php echo $registro->id; ?></td>
                        <td><?php echo $registro->descripcion; ?></td>
                        <td><?php echo $registro->fecha; ?></td>
                        <td><?php echo $registro->cantidad; ?></td>
                        <td><?php echo $registro->categoria; ?></td>
                        <td><?php echo $registro->tipo; ?></td>
                        <td><?php echo $registro->usuario; ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </section>
</body>

</html>