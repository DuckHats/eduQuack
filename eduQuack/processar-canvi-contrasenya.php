<?php
require_once "config.php";

if($mysqli === false){
    die("ERROR: No se pudo conectar a la base de datos. " . $mysqli->connect_error);
}

    $novaContrasenya = $mysqli->real_escape_string($_POST['nova_contrasenya']);
    $email = $mysqli->real_escape_string($_POST['email']);

    // Encriptem la nova contrasenya
    $novaContrasenyaEncriptada = password_hash($novaContrasenya, PASSWORD_DEFAULT);

    // Actualitzem la contrasenya a la base de dades
    $actualitzarContrasenya = $mysqli->query("UPDATE usuarios SET password = '$novaContrasenyaEncriptada' WHERE correu = '$email'");

    if($actualitzarContrasenya) {
        echo "Contrasenya actualitzada amb èxit.";
    } else {
        echo "Error en l'actualització de la contrasenya. Si us plau, intenta-ho de nou.";
    }

    // Tanquem la connexió a la base de dades
    $mysqli->close();
?>