<?php
$current_page = $_SERVER['REQUEST_URI'];
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : 'usuario';
$modules = [
  "usuarios" => ["text" => "Usuarios", "permission" => 1],
  "tipos" => ["text" => "Tipos", "permission" => 1],
  "gastos" => ["text" => "Gastos", "permission" => 2],
  "categorias" => ["text" => "Categorías", "permission" => 2],
  "roles" => ["text" => "Roles", "permission" => 1],
  "dashboard" => ["text" => "Dashboard", "permission" => 2]
];
?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="fs-4">Control de gastos</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <?php
    foreach ($modules as $moduleIndex => $module) {
      if ($rol > $module["permission"]) {
        continue;
      }
    ?>
      <li class="nav-item">
        <a href="../../modules/<?php echo $moduleIndex; ?>/index.php" class="nav-link <?php echo strpos($current_page, $moduleIndex) !== false ? 'active' : 'text-white'; ?>">
          <?php echo $module["text"]; ?>
        </a>
      </li>
    <?php
    }
    ?>
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