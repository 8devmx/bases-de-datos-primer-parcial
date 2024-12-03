<?php
$emailUser = $_POST["correo"];
$nipUser = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT); 

require_once "db.php";      
require_once "enviocorreo.php"; 

$consulta = "UPDATE usuarios SET nip='$nipUser', recovery=1 WHERE correo='$emailUser'";
$resultado = mysqli_query($enlace, $consulta);

if ($resultado) {
    if (enviarCorreo($emailUser, $nipUser)) {
        echo "PIN generado y actualizado correctamente. Por favor revise el buzón de su correo. Inserte el pin en el espacio de la contraseña para iniciar sesión.";
    } else {
        echo "PIN generado, pero ocurrió un error al enviar el correo.";
    }

    echo '<script>
        setTimeout(function() {
            window.location.href = "../";
        }, 6000);
    </script>';
} else {
    echo "Error al generar el NIP o actualizar el estado.";
    echo '<script>
        setTimeout(function() {
            window.location.href = "../";
        }, 5000);
    </script>';
    exit();
}
?>
