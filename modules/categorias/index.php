<?php
    require_once '../../lib/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../lib/head.php'; ?>
    <title>Categorías</title>
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
        <h1>Categorías</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>  
                    <th>Nombre</th>  
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta = "SELECT * FROM categorias";
                $resultado = mysqli_query($enlace, $consulta);
                while($registro = mysqli_fetch_object($resultado)){
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
