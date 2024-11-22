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
    $idUsuario = $_SESSION['id'];
    include_once '../../lib/sidebar.php';
    ?>
    <section class="p-3 w-100">
        <h1>Categorías
            <a href="insertar.php" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                </svg>
            </a>
        </h1>

        <div class="d-inline-flex flex-column align-items-start">                 
            <form method="GET" action="index.php" class="d-inline">
                <label for="orderSelect" class="form-label text-muted">Ordenar por nombre:</label> 
                <select name="order" id="orderSelect" class="form-select w-auto" onchange="this.form.submit()">             
                    <option value="" disabled selected>Selecciona una opción...</option>             
                    <option value="ascendente" <?php if (isset($_GET['order']) && $_GET['order'] === 'ascendente') echo 'selected'; ?>>Ascendente</option>             
                    <option value="descendente" <?php if (isset($_GET['order']) && $_GET['order'] === 'descendente') echo 'selected'; ?>>Descendente</option>         
                </select>
            </form>
        </div>
        <div class="d-inline-flex flex-column align-items-start">
            <form method="GET" action="index.php" class="d-inline">
                <label for="statusCategorias" class="form-label text-muted">Filtrar por status:</label>
                <select name="statusCategorias" id="statusCategorias" class="form-select w-auto" onchange="this.form.submit()">
                    <option value="" disabled selected>Selecciona una opción...</option>
                    <option value="">Todos</option>
                    <option value="1" <?php if(isset($_GET['statusCategorias']) && $_GET['statusCategorias'] == '1') echo 'selected'; ?>>Activado</option>
                    <option value="0" <?php if(isset($_GET['statusCategorias']) && $_GET['statusCategorias'] == '0') echo 'selected'; ?>>Desactivado</option>
                </select>
            </form>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>  
                    <th>Nombre</th> 
                    <th>Fecha de creación</th> 
                    <th>Fecha de modificación</th> 
                    <th>Usuario</th> 
                    <th>Status</th> 
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                    $order = 'ASC'; 
                    if (isset($_GET['order']) && ($_GET['order'] == 'ascendente' || $_GET['order'] == 'descendente')) {
                        $order = $_GET['order'] === 'descendente' ? 'DESC' : 'ASC';
                    }
                    $status = isset($_GET['statusCategorias']) ? $_GET['statusCategorias'] : '';
                    $consulta = "SELECT c.id, c.nombre, c.creacion, c.modificacion, c.status, c.color, u.nombre as usuario FROM categorias c JOIN usuarios u ON c.usuario = u.id WHERE c.usuario = $idUsuario";
                    if ($status !== '') {
                        $consulta .= " AND c.status = '$status'";
                    }
                    
                    $consulta .= " ORDER BY c.nombre $order";
                    
                    $resultado = mysqli_query($enlace, $consulta);

                    while($registro = mysqli_fetch_object($resultado)){
                ?>
                    <tr>
                        <td><?php echo $registro->id; ?></td>
                        <td>
                            <span style="display: inline-block; width: 10px; height: 10px; background-color: #<?php echo $registro->color; ?>; border-radius: 50%; margin-right: 5px;"></span>
                            <?php echo $registro->nombre; ?>
                        </td>
                        <td><?php echo $registro->creacion; ?></td>
                        <td><?php echo $registro->modificacion; ?></td>
                        <td><?php echo $registro->usuario; ?></td>
                        <td><?php echo $registro->status == 1 ? "✅" : "❌"; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $registro->id; ?>" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                </svg>
                            </a>
                            <a href="eliminar.php?id=<?php echo $registro->id; ?>" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>
</html>
