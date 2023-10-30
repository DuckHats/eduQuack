<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    // Si el usuario no ha iniciado sesión, redirige a la página de login
    header("location: login.html");
    exit;
} else {
    header("location: teams.html");
    exit;
    // Si el usuario ha iniciado sesión, realiza alguna acción específica aquí
    // Por ejemplo, mostrar un mensaje de bienvenida o cargar datos del usuario
    // Puedes colocar tu código adicional aquí
}
