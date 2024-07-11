<?php
// Verificar si la sesión está activa antes de llamarla
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Destruir la sesión
session_destroy();
// Redirigir al usuario a la página de inicio de sesión
header("Location: index.php");
exit(); // Asegúrate de salir después de redirigir
?>
