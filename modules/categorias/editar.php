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
        $rolUsuario = $_SESSION['rol'];
        include_once '../../lib/sidebar.php';
    ?>
    <section class="p-3 w-100">
        <h1>Categorías</h1>
        <form method="POST" action="../../lib/editarCategorias.php">
            <?php
            $id = $_GET['id'];
            $consulta = "SELECT * FROM categorias WHERE id = $id";
            $resultado = mysqli_query($enlace, $consulta);
            $registro =  mysqli_fetch_object($resultado);
            ?>
            <div class="form-group mb-3">
                <label>Nombre:</label>
                <input type="text" value="<?php echo $registro->nombre; ?>" class="form-control" name="nombreCategorias" id="nombreCategorias">
            </div>
            <div class="form-group mb-3" id="color">
                <label>Editar Color:</label><br>
                <input type="color" name="colorCategoria" value="#<?php echo $registro->color; ?>" style="min-width: 90px;">
            </div>
            <?php
                $correo = $_SESSION["correo"];
                $consultaUsuario = "SELECT id FROM usuarios WHERE correo = '$correo'";
                $resultadoUsuario = mysqli_query($enlace, $consultaUsuario);
                $usuarioSesion = mysqli_fetch_assoc($resultadoUsuario);
            ?>
            <input type="hidden" name="usuario" value="<?php echo $usuarioSesion['id']; ?>">
            <div class="form-group mb-3">
                <label>Status:</label>
                <select name="statusCategorias" id="statusCategorias" class="form-control">
                    <option value="1">Activado</option>
                    <option value="0">Desactivado</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="idCategorias" id="idCategorias">
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
            <hr>
        </form>
    </section>
    </body>
    </html>
