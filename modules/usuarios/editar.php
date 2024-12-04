<?php
require_once '../../lib/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../lib/head.php'; ?>
    <title>Usuarios</title>
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
        <h1>Usuarios</h1>
        <form method="POST" action="../../lib/editarUsuarios.php">
            <?php
            $id = $_GET['id'];
            $consulta = "SELECT * FROM usuarios WHERE id = $id";
            $resultado = mysqli_query($enlace, $consulta);
            $registro =  mysqli_fetch_object($resultado);
            ?>
            <div class="form-group mb-3">
                <label>Nombre:</label>
                <input type="text" value="<?php echo $registro->nombre; ?>" class="form-control" name="nombreUsuario" id="nombreUsuario">
            </div>
            <div class="form-group mb-3">
                <label>Teléfono:</label>
                <input type="tel" value="<?php echo $registro->telefono; ?>" class="form-control" name="telefonoUsuario" id="telefonoUsuario">
            </div>
            <div class="form-group mb-3">
                <label>Correo:</label>
                <input type="text" value="<?php echo $registro->correo; ?>" class="form-control" name="correoUsuario" id="correoUsuario">
            </div>
            <div class="form-group mb-3">
                <label>Password:</label>
                <input type="password" value="<?php echo $registro->password; ?>" class="form-control" name="passwordUsuario" id="passwordUsuario">
            </div>
            <?php
            $consultaRoles = "SELECT id, nombre FROM roles";
            $resultadoRoles = mysqli_query($enlace, $consultaRoles);
            ?>
            <div class="form-group mb-3">
                <label>Rol:</label>
                <select name="rol" id="rolUsuario" class="form-control">
                    <?php
                    while ($rol = mysqli_fetch_object($resultadoRoles)) {
                        echo '<option value="' . $rol->id . '" ' . ($rol->id == $registro->rol ? 'selected' : '') . '>' . $rol->nombre . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Status:</label>
                <select name="statusUsuario" id="statusUsuario" class="form-control">
                    <option value="1">Activado</option>
                    <option value="0">Desactivado</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="idUsuario" id="idUsuario">
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
            <hr>
        </form>
    </section>
</body>

</html>
