<?php
session_start();
require_once __DIR__ . '/DB/LIBS/LIB_PHPMAILER/PHPMailerAutoload.php';
require_once __DIR__ . '/DB/LIBS/LIB_PHPMAILER/class.phpmailer.php';
require_once __DIR__ . '/DB/LIBS/LIB_PHPMAILER/class.smtp.php';

// Credenciales del correo emisor
$correo_emisor = 'sosahijas@gmail.com';
$contrasena = 'kdpy nbss bgfu kdgc'; // Reemplazar con la contraseña de la aplicación generada

// Obtener la ruta del archivo PDF y el correo del destinatario de la sesión
$pdf_file_path = isset($_SESSION['pdf_file_path']) ? $_SESSION['pdf_file_path'] : '';
$correo_cliente = isset($_SESSION['correo_cliente']) ? $_SESSION['correo_cliente'] : '';

// Verificar si el archivo PDF existe
if (!empty($pdf_file_path) && file_exists($pdf_file_path)) {
    // Configuración del correo
    $mail = new PHPMailer();

    try {
        // Configurar el servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $correo_emisor;
        $mail->Password = $contrasena;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configurar el remitente y el destinatario
        $mail->setFrom($correo_emisor, 'Empresa Sosa e HIJAS');
        $mail->addAddress($correo_cliente); // Utilizar el correo del cliente

        // Configurar el asunto y el cuerpo del correo
        $mail->Subject = 'Pedido de Cotizacion via WEB';
        $mail->Body = 'por este medio remito la cotizacion pedida el dia : ';

        // Adjuntar el archivo PDF
        $mail->addAttachment($pdf_file_path);

        // Enviar el correo
        if ($mail->send()) {
            echo 'Correo enviado correctamente';
        } else {
            echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }

    // Eliminar la variable de sesión después de enviar el correo
    unset($_SESSION['pdf_file_path']);
    unset($_SESSION['correo_cliente']); // Utilizar la variable de sesión correcta
} else {
    require_once("seguridad.php"); 
    echo 'No se encontró el archivo PDF.';
}
?>
