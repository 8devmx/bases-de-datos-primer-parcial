<?php
require_once '../../lib/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuarios</title>
</head>

<body>
  <h1>Usuarios</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $consulta = "SELECT * FROM usuarios";
      $resultado = mysqli_query($enlace, $consulta);
      while ($registro = mysqli_fetch_object($resultado)) {
      ?>
        <tr>
          <td><?php echo $registro->id;  ?></td>
          <td><?php echo $registro->nombre; ?></td>
          <td><?php echo $registro->telefono; ?></td>
          <td><?php echo $registro->correo; ?></td>
          <td><?php echo $registro->status; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>

</html>