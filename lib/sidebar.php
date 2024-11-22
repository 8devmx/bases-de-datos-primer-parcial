<?php
$current_page = $_SERVER['REQUEST_URI'];
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : 'usuario'; 
?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4">Control de gastos</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <?php if ($rol === '1') { ?>
        <li class="nav-item">
          <a href="../../modules/usuarios/index.php" class="nav-link <?php echo strpos($current_page, 'usuarios') !== false ? 'active' : 'text-white'; ?>">
            Usuarios
          </a>
        </li>
        <li>
          <a href="../../modules/tipos/index.php" class="nav-link <?php echo strpos($current_page, 'tipos') !== false ? 'active' : 'text-white'; ?>">
            Tipos
          </a>
        </li>
      <?php } ?>
      <li>
        <a href="../../modules/gastos/index.php" class="nav-link <?php echo strpos($current_page, 'gastos') !== false ? 'active' : 'text-white'; ?>">
          Gastos
        </a>
      </li>
      <li>
        <a href="../../modules/categorias/index.php" class="nav-link <?php echo strpos($current_page, 'categorias') !== false ? 'active' : 'text-white'; ?>">
          Categorías
        </a>
      </li>
      <?php if ($rol === '1') { ?>
        <li>
          <a href="../../modules/roles/index.php" class="nav-link <?php echo strpos($current_page, 'roles') !== false ? 'active' : 'text-white'; ?>">
            Roles
          </a>
        </li>
      <?php } ?>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?php echo $_SESSION["nombre"]; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="../../lib/logout.php">Sign out</a></li>
      </ul>
    </div>
</div>
