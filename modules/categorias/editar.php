<?php
require_once '../../lib/db.php';
$idCategoria = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../lib/head.php'; ?>
    <title>Modificar Categoria</title>
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
        <form method="POST" action="../../lib/editarCategorias.php">
            <input type="hidden" name="idCategoria" value="<?php echo $idCategoria; ?>">
            <div class="form-group mb-3">
                <label>Editar Categoria:</label>
                <input type="text" class="form-control" name="categoriaUsuario" id="categoriaUsuario">
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
            </div>
            <hr>
        </form>
    </section>
</body>

</html>
