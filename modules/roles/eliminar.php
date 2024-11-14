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
  <div class="alert alert-danger" role="alert">
    ¿Deseas eliminar el registro con id <?php echo $_GET['id'];?>?
  </div>
  <a href="../../lib/eliminarRoles.php?id=<?php echo $_GET['id'];?>" class="btn btn-success">Si, eliminar</a>
  <a href="../roles/index.php" class="btn btn-danger">No, conservar</a>
</section>
</body>

</html>
