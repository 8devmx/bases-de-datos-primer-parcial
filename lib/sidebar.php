<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="fs-4">📝 Control de Gastos</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="#" class="nav-link active" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16">
          <use xlink:href="#home" />
        </svg>
        Usuarios
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <svg class="bi pe-none me-2" width="16" height="16">
          <use xlink:href="#speedometer2" />
        </svg>
        Tipos
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <svg class="bi pe-none me-2" width="16" height="16">
          <use xlink:href="#table" />
        </svg>
        Gastos
      </a>
    </li>
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