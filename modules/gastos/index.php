<?php
    require_once '../../lib/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos</title>
</head>
<body>
    <h1>Gastos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>  
                <th>Descripción</th>  
                <th>Fecha</th>  
                <th>Cantidad</th>  
                <th>Categoría</th>  
                <th>Usuario</th>  
            </tr>
        </thead>
        <tbody>
            <?php
            $consulta = "SELECT * FROM gastos";
            $resultado = mysqli_query($enlace, $consulta);
            while($registro = mysqli_fetch_object($resultado)){
            ?>
            <tr>
                <td><?php echo $registro->id; ?></td>
                <td><?php echo $registro->descripcion; ?></td>
                <td><?php echo $registro->fecha; ?></td>
                <td><?php echo $registro->cantidad; ?></td>
                <td><?php echo $registro->categoria; ?></td>
                <td><?php echo $registro->usuario; ?></td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</body>
</html>
