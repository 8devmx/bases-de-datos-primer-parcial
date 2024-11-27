<?php
require_once '../../lib/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../../lib/head.php'; ?>
    <title>Dashboard</title>
</head>

<body class="d-flex flex-nowrap">
    <?php
    session_start();
    if (!isset($_SESSION["correo"])) {
        header("Location: ../../lib/login.php");
        exit();
    }
    $idUsuario = $_SESSION['id'];
    $rolUsuario = $_SESSION['rol'];
    include_once '../../lib/sidebar.php';
    ?>

    <section class="p-3 w-100">
        <div class="container mt-5">
            <div class="row">
                <div class="col text-center">
                    <h1 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
  <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
  <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
  <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
</svg> Dashboard</h1>
                </div>
            </div>

            <?php if ($rolUsuario == 1): ?>
                <div class="row mb-4">
                    <div class="col-md-6 offset-md-3">
                        <form method="GET" action="">
                            <div class="mb-2">
                                <label for="usuario" class="form-label text-muted">Filtrar por usuario:</label>
                            </div>
                            <div class="d-flex">
                                <select name="usuario" id="usuario" class="form-select me-2">
                                    <option value="" disabled selected>Seleccione un usuario</option>
                                    <?php
                                    $usuariosConsulta = "SELECT id, nombre FROM usuarios";
                                    $usuariosResultado = mysqli_query($enlace, $usuariosConsulta);
                                    while ($usuario = mysqli_fetch_object($usuariosResultado)) {
                                        $selected = (isset($_GET['usuario']) && $_GET['usuario'] == $usuario->id) ? 'selected' : '';
                                        echo "<option value='$usuario->id' $selected>$usuario->nombre</option>";
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
  <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
</svg>Filtrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            if (isset($_GET['usuario']) && $_GET['usuario'] != '') {
                $idUsuarioFiltrado = $_GET['usuario'];
            } else {
                $idUsuarioFiltrado = $idUsuario;
            }

            $consulta = "
            SELECT g.cantidad, c.nombre AS categoria, t.nombre AS tipo FROM gastos g JOIN usuarios u ON g.usuario = u.id JOIN tipos t ON g.tipo = t.id JOIN categorias c ON g.categoria = c.id WHERE g.usuario = $idUsuarioFiltrado ORDER BY c.nombre, t.nombre;";

            $resultado = mysqli_query($enlace, $consulta);

            $totalGastos = 0;
            $totalIngresos = 0;
            $gastosPorCategoria = [];

            while ($registro = mysqli_fetch_object($resultado)) {
                if ($registro->tipo == 'Gasto') {
                    $totalGastos += $registro->cantidad;
                    if (!isset($gastosPorCategoria[$registro->categoria])) {
                        $gastosPorCategoria[$registro->categoria] = 0;
                    }
                    $gastosPorCategoria[$registro->categoria] += $registro->cantidad;
                } elseif ($registro->tipo == 'Ingreso') {
                    $totalIngresos += $registro->cantidad;
                }
            }
            $balance = $totalIngresos - $totalGastos;
            ?>

            <div class="row">
                <div class="col-md-4">
                    <div class="card text-bg-light mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total de ingresos</h5>
                            <p class="card-text"><?php echo $totalIngresos; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-light mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total de gastos</h5>
                            <p class="card-text"><?php echo $totalGastos; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-light mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Balance</h5>
                            <p class="card-text text-<?php echo $balance < 0 ? 'danger' : 'success'; ?>">
                                <?php echo $balance; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card text-bg-light">
                        <div class="card-header">Total de gastos por categoría</div>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($gastosPorCategoria as $categoria => $totalCategoria) { ?>
                                <li class="list-group-item">
                                    <?php echo $categoria; ?>: <?php echo $totalCategoria; ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>