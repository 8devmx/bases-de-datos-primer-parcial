<?php
    require_once '../../lib/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../lib/head.php'; ?>
    <title>Roles</title>
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
        <h1>Roles</h1>
        <form method="POST" action="../../lib/editarRoles.php">
            <?php
            $id = $_GET['id'];
            $consulta = "SELECT * FROM roles WHERE id = $id";
            $resultado = mysqli_query($enlace, $consulta);
            $registro =  mysqli_fetch_object($resultado);
            ?>
            <div class="form-group mb-3">
                <label>Nombre:</label>
                <input type="text" value="<?php echo $registro->nombre; ?>" class="form-control" name="nombreRoles" id="nombreRoles">
            </div>
            <div class="form-group mb-3">
                <label>Status:</label>
                <select name="statusRoles" id="statusRoles" class="form-control">
                    <option value="1">Activado</option>
                    <option value="0">Desactivado</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="idRoles" id="idRoles">
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
            <hr>
        </form>
    </section>
</body>
</html>
