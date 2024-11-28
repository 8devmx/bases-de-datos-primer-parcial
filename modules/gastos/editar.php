<?php
    require_once '../../lib/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../lib/head.php'; ?>
    <title>Gastos</title>
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
        <h1>Gastos</h1>
        <form method="POST" action="../../lib/editarGastos.php">
            <?php
                $id = $_GET['id'];
                $consulta = "SELECT g.id, g.descripcion, g.creacion, g.modificacion, g.cantidad, g.categoria as categoria_id, g.tipo as tipo_id, g.usuario as usuario_id, u.nombre as usuario_nombre, t.nombre as tipo_nombre, c.nombre as categoria_nombre FROM gastos g JOIN usuarios u ON g.usuario = u.id JOIN tipos t ON g.tipo = t.id JOIN categorias c ON g.categoria = c.id WHERE g.id = $id";
                $resultado = mysqli_query($enlace, $consulta);
                $registro =  mysqli_fetch_object($resultado);
            ?>
            <div class="form-group mb-3">
                <label>Descripción:</label>
                <input type="text" value="<?php echo $registro->descripcion; ?>" class="form-control" name="descripcionGastos" id="descripcionGastos">
            </div>
            <div class="form-group mb-3">
                <label>Cantidad:</label>
                <input type="text" value="<?php echo $registro->cantidad; ?>" class="form-control" name="cantidadGastos" id="cantidadGastos">
            </div>
            <?php
            $consultaCategoria = "SELECT id, nombre FROM categorias";
            $resultadoCategoria = mysqli_query($enlace, $consultaCategoria);
            ?>
            <div class="form-group mb-3">
                <label>Categoría:</label>
                <select name="categoria" id="categoriaUsuario" class="form-control">
                    <?php
                    while ($categoria = mysqli_fetch_object($resultadoCategoria)) {
                        echo '<option value="' . $categoria->id . '" ' . ($categoria->id == $registro->categoria ? 'selected' : '') . '>' . $categoria->nombre . '</option>';
                    }
                    ?>
                </select>
            </div>
            <?php
            $consultaTipo = "SELECT id, nombre FROM tipos";
            $resultadoTipo = mysqli_query($enlace, $consultaTipo);
            ?>
            <div class="form-group mb-3">
                <label>Tipo:</label>
                <select name="tipo" id="tipoGastos" class="form-control">
                    <?php
                    while ($tipo = mysqli_fetch_object($resultadoTipo)) {
                        echo '<option value="' . $tipo->id . '" ' . ($tipo->id == $registro->tipo ? 'selected' : '') . '>' . $tipo->nombre . '</option>';
                    }
                    ?>
                </select>
            </div>
            <?php if ($rolUsuario != 2) { 
            $consultaUsuario = "SELECT id, nombre FROM usuarios WHERE status !=0";
            $resultadoUsuario = mysqli_query($enlace, $consultaUsuario);
            ?>
            <div class="form-group mb-3">
                <label>Usuario:</label>
                <select name="usuario" id="usuarioGastos" class="form-control">
                    <?php
                    while ($usuario_id = mysqli_fetch_object($resultadoUsuario)) {
                        echo '<option value="' . $usuario_id->id . '" ' . ($usuario_id->id == $registro->usuario_id ? 'selected' : '') . '>' . $usuario_id->nombre . '</option>';
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
                <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="idGastos" id="idGastos">
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
            <hr>
        </form>
    </section>
    </body>
    </html>
