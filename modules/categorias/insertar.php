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
        <form>
            <?php
            $consulta = "SELECT * FROM categorias";
            $resultado = mysqli_query($enlace, $consulta);
            
            while ($registro = mysqli_fetch_object($resultado)) {
                ?>
                <div class="form-group mb-3">
                    <label>Nombre:</label>
                    <input type="text" value="<?php echo $registro->nombre; ?>" readonly class="form-control">
                </div>
                <hr>
                <?php
                    }
                ?>
        </form>
    </section>
    </body>
    </html>
