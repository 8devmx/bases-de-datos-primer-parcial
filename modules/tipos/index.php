<?php
    require_once '../../lib/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos</title>
</head>
<body>
    <h1>Tipos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>  
                <th>Nombre</th>  
            </tr>
        </thead>
        <tbody>
            <?php
            $consulta = "SELECT * FROM tipos";
            $resultado = mysqli_query($enlace, $consulta);
            while($registro = mysqli_fetch_object($resultado)){
                ?>
                <tr>
                    <td><?php echo $registro->id; ?></td>
                    <td><?php echo $registro->nombre; ?></td>
                </tr>
                <?php } ?>
                
            </tbody>
        </table>
    </body>
    </html>

