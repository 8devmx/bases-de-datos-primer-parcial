<?php
require_once '../../lib/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../lib/head.php'; ?>
    <title>Añadir Usuarios</title>
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
    <?php
        date_default_timezone_set('America/Cancun');
        $dateTimeNow = date("Y-m-d\TH:i"); 
    ?>
    <section class="p-3 w-100">
        <h1>Usuarios</h1>
        <form method="POST" action="../../lib/insertarUsuarios.php">
            <div class="form-group mb-3">
                <label>Nombre:</label>
                <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario">
            </div>
            <div class="form-group mb-3">
                <label>Teléfono:</label>
                <input type="tel" class="form-control" name="telefonoUsuario" id="telefonoUsuario">
            </div>
            <div class="form-group mb-3">
                <label>Correo:</label>
                <input type="email" class="form-control" name="correoUsuario" id="correoUsuario">
            </div>
            <div class="form-group mb-3">
                <label>Password:</label>
                <input type="password" class="form-control" name="passwordUsuario" id="passwordUsuario">
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
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            <hr>
        </form>
    </section>
</body>

</html>
