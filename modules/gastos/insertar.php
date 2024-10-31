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
        <form>
            <?php
            $consulta = "SELECT g.id, g.descripcion, g.fecha, g.cantidad, u.nombre as usuario, t.nombre as tipo, c.nombre as categoria FROM gastos g join usuarios u on g.usuario = u.id join tipos t on g.tipo = t.id join categorias c on g.categoria = c.id";
            $resultado = mysqli_query($enlace, $consulta);
            
            while ($registro = mysqli_fetch_object($resultado)) {
                ?>
                <div class="form-group mb-3">
                    <label>Descripción:</label>
                    <input type="text" value="<?php echo $registro->descripcion; ?>" readonly class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Fecha:</label>
                    <input type="text" value="<?php echo $registro->fecha; ?>" readonly class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Cantidad:</label>
                    <input type="text" value="<?php echo $registro->cantidad; ?>" readonly class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Categoría:</label>
                    <input type="text" value="<?php echo $registro->categoria; ?>" readonly class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Tipo:</label>
                    <input type="text" value="<?php echo $registro->tipo; ?>" readonly class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Usuario:</label>
                    <input type="text" value="<?php echo $registro->usuario; ?>" readonly class="form-control">
                </div>
                <hr>
                <?php
                    }
                ?>
        </form>
    </section>
    </body>
    </html>