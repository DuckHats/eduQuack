<?php
// Initialize the session
session_start();

// Verifica si la solicitud proviene del formulario
if (isset($_POST['logout']) && $_POST['logout'] === 'true') {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_destroy();

    // Redirect to login page
    header("location: login.html");
    exit;
} else {
    // Si la solicitud no proviene del formulario, redirige a alguna otra página o muestra un mensaje de error.
    var_dump($_POST);

    // header("location: error.php");
    exit;
}
?>