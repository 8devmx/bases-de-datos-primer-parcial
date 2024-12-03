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
        <form method="POST" action="../../lib/insertarCategorias.php">
            <div class="form-group mb-3">
                <label>Nombre:</label>
                <input type="text" class="form-control" name="nombreCategorias" id="nombreCategorias">
            </div>
            <div class="form-group mb-3">
                <label>Selecciona Un Color:</label><br>
                <input type="color" name="colorCategoria" value="FFFFFF" style="min-width: 148px;">
            </div>
            <?php if ($rolUsuario != 2) { 
            $consultaUsuario = "SELECT id, nombre FROM usuarios WHERE status !=0";
            $resultadoUsuario = mysqli_query($enlace, $consultaUsuario);
            ?>
            <div class="form-group mb-3">
                <label>Usuario:</label>
                <select name="usuario" id="usuarioCategorias" class="form-control">
                    <?php
                    while ($usuario = mysqli_fetch_object($resultadoUsuario)) {
                        echo '<option value="' . $usuario->id . '" ' . ($usuario->id == $registro->usuario ? 'selected' : '') . '>' . $usuario->nombre . '</option>';
                    }
                    ?>
                </select>
            </div>
            <?php } else {?>
            <?php
                $correo = $_SESSION["correo"];
                $consultaUsuario = "SELECT id FROM usuarios WHERE correo = '$correo'";
                $resultadoUsuario = mysqli_query($enlace, $consultaUsuario);
                $usuarioSesion = mysqli_fetch_assoc($resultadoUsuario);
            ?>
            <input type="hidden" name="usuario" value="<?php echo $usuarioSesion['id']; ?>">
            <?php } ?>
            <div class="form-group mb-3">
                <label>Status:</label>
                <select name="statusCategorias" id="statusCategorias" class="form-control">
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
