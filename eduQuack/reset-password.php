<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $mysqli->real_escape_string($_POST['email']);
    $nueva_contrasenya = $mysqli->real_escape_string($_POST['nueva_contrasenya']);

    // Encriptar la nueva contraseña
    $contrasenya_encriptada = password_hash($nueva_contrasenya, PASSWORD_DEFAULT);

    // Actualizar la contraseña en la base de datos
    $mysqli->query("UPDATE usuarios SET password = '$contrasenya_encriptada' WHERE email = '$email'");

    echo "¡Contraseña actualizada correctamente!";
}
?>
