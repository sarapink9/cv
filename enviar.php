<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre de Visitante: " . $nombre . "  Correo de: " . $correo . "  Teléfono: " . $telefono;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php'; 
//enviar directamente el correo
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Protocolo que se usa para enviarSMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'gcs1731100728@gmail.com';                     // SMTP correo - acceso
    $mail->Password   = 'panqueAZUL';                               // SMTP password
    $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    // TCP port que vamos a usar
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('gcs1731100728@gmail.com', $nombre); // Desde donde se va ha enviar
    $mail->addAddress('mafalda.gonn@gmail.com');     // ha quien se le va enviar

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $body;
    $mail->Body  = $mensaje;
    $mail->CharSet = 'UTF-8';
    $mail->send();
    echo '<script>
            alert("El mensaje se envío correctamente");
            window.history.go(-1);
          </script>
         ';
} catch (Exception $e) {
    echo "Error al enviar e mensaje: {$mail->ErrorInfo}";
}
