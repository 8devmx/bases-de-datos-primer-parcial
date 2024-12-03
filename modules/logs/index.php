<?php
    require_once '../../lib/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../lib/head.php'; ?>
    <title>Logs</title>
</head>
<body class="d-flex flex-nowrap">
<?php
    session_start();
    if (!isset($_SESSION["correo"])) {
        header("Location: ../../index.php");
        exit();
    }
    if ($_SESSION['rol'] != 1) {
        echo "Acceso denegado. No tienes permisos para esta página.";
        exit();
    }
    include_once '../../lib/sidebar.php';
?>
    <section class="p-3 w-100">
        <h1>Logs</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>  
                    <th>Descripción</th> 
                    <th>Fecha de creación</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                    $consulta = "SELECT * FROM logs";                    
                    $resultado = mysqli_query($enlace, $consulta);
                    while($registro = mysqli_fetch_object($resultado)){
                ?>
                    <tr>
                        <td><?php echo $registro->id; ?></td>
                        <td><?php echo $registro->descripcion; ?></td>
                        <td><?php echo $registro->creacion; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>
</html>
