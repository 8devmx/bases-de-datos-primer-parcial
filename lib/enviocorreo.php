<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../PHPMailer-master/src/Exception.php';
require_once __DIR__ . '/../PHPMailer-master/src/PHPMailer.php';
require_once __DIR__ . '/../PHPMailer-master/src/SMTP.php';

function enviarCorreo($correoDestino, $nip) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'josueplata325@gmail.com'; 
        $mail->Password   = 'fdvdkeewnprdftsk'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->setFrom('josueplata325@gmail.com', 'Soporte');
        $mail->addAddress($correoDestino);

        $mail->isHTML(true);
        $mail->Subject = 'Recuperación de Cuenta';
        $mail->Body    = "
            <h1>Hola,</h1>
            <p>Tu NIP para iniciar sesión es: <strong>$nip</strong></p>
        ";
        $mail->AltBody = "Hola,\nTu NIP para iniciar sesión es: $nip";

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
        return false;
    }
}
?>
