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
    <?php
        date_default_timezone_set('America/Cancun');
        $dateTimeNow = date("Y-m-d\TH:i"); 
    ?>
    <section class="p-3 w-100">
        <h1>Roles</h1>
        <form method="POST" action="../../lib/insertarRoles.php">
            <div class="form-group mb-3">
                <label>Nombre:</label>
                <input type="text" class="form-control" name="nombreRoles" id="nombreRoles">
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
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            <hr>
        </form>
    </section>
</body>
</html>
