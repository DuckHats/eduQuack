<?php
// Iniciar la sesión
session_start();

// Contraseña permitida
$contrasena_permisiva = "admin"; // Reemplázalo con tu propia contraseña

// Verificar la contraseña
if ($_POST["contrasena"] === $contrasena_permisiva) {
    $_SESSION["loggedin"] = true;
    header("location: admin_news.php");
    exit;
} else {
    header("location: news_admin_login.html");
}
?>
