<?php
$emailUser = $_POST["correo"];
$passwordUser = $_POST["password"];

require_once "db.php";

$consultaRecovery = "SELECT * FROM usuarios WHERE correo='$emailUser'";
$resultadoRecovery = mysqli_query($enlace, $consultaRecovery);

if (mysqli_num_rows($resultadoRecovery) > 0) {
    $registro = mysqli_fetch_object($resultadoRecovery);

    if ($registro->recovery == 1) {
        $consultaNip = "SELECT * FROM usuarios WHERE correo='$emailUser' AND nip='$passwordUser'";
        $resultadoNip = mysqli_query($enlace, $consultaNip);

        if (mysqli_num_rows($resultadoNip) > 0) {
            session_start();
            $_SESSION["nombre"] = $registro->nombre;
            $_SESSION["correo"] = $registro->correo;
            $_SESSION["id"] = $registro->id;
            $_SESSION["rol"] = $registro->rol;

            $consultaReset = "UPDATE usuarios SET nip='0', recovery='0' WHERE correo='$emailUser'";
            mysqli_query($enlace, $consultaReset);

            header("Location: ../modules/gastos/");
            exit();
        } else {
            echo "NIP incorrecto. Verifique e intente nuevamente.";
            echo '  <script>
                        setTimeout(function() {
                            window.location.href = "../";
                        }, 3000);
                    </script>';
            exit();
        }
    } else {
        $consultaPassword = "SELECT * FROM usuarios WHERE correo='$emailUser' AND password='$passwordUser'";
        $resultadoPassword = mysqli_query($enlace, $consultaPassword);

        if (mysqli_num_rows($resultadoPassword) > 0) {
            $registro = mysqli_fetch_object($resultadoPassword);
            if ($registro->status == 0) {
                echo "Acceso denegado. Actualmente su usuario se encuentra desactivado.";
                exit();
            }
            session_start();
            $_SESSION["nombre"] = $registro->nombre;
            $_SESSION["correo"] = $registro->correo;
            $_SESSION["id"] = $registro->id;
            $_SESSION["rol"] = $registro->rol;

            header("Location: ../modules/gastos/");
            exit();
        } else {
            echo "Contraseña incorrecta. Verifique e intente nuevamente.";
            echo '  <script>
                        setTimeout(function() {
                            window.location.href = "../";
                        }, 3000);
                    </script>';
            exit();
        }
    }
    } else {
        echo "El usuario no existe. Verifique el correo ingresado.";
        echo '  <script>
                    setTimeout(function() {
                        window.location.href = "../";
                    }, 3000);
                </script>';
    exit();
    }
?>
