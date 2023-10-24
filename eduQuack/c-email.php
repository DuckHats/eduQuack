<?php
require_once "config.php";

if($mysqli === false){
    die("ERROR: No se pudo conectar a la base de datos. " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $mysqli->real_escape_string($_POST['email']);

    // Comprovem si l'email existeix a la base de dades
    $consulta = $mysqli->query("SELECT * FROM usuaris WHERE correu = '$email'");

    if ($consulta->num_rows > 0) {
        // L'email existeix, permetem que l'usuari canviï la contrasenya
        header("Location: canviar-contrasenya.php");
        // Mostra un formulari perquè l'usuari introdueixi la nova contrasenya
        // Amb el mètode POST, actualitza la contrasenya a la base de dades
        // Mostra un missatge de confirmació a l'usuari
    } else {
        // L'email no existeix a la base de dades, redirigeix a una pàgina d'error
        header("Location: error.php"); // redirigeix a la pàgina d'error
        exit();
    }

    // Tanquem la connexió a la base de dades
    $mysqli->close();
}
?>

