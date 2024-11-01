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
    <?php include_once '../../lib/sidebar.php'; ?>
    <section class="container p-4 w-100">
        <h1 class="mb-4">Tipos</h1>
        
       
        <table class="table table-striped table-hover">
            <thead class="table table-striped table-hover">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta = "SELECT * FROM tipos";
                $resultado = mysqli_query($enlace, $consulta);
                while ($registro = mysqli_fetch_object($resultado)) {
                ?>
                    <tr>
                        <td><?php echo $registro->id; ?></td>
                        <td><?php echo $registro->nombre; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>

</html>