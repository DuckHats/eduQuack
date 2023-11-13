<?php
$servername = "localhost"; // Cambia esto si tu servidor de base de datos está en un host diferente
$username = "root"; // Nombre de usuario de la base de datos
$password = "1234"; // Contraseña de la base de datos
$database = "eduQuack"; // Nombre de la base de datos

// Crea la conexión
$mysqli = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}

// Establece el conjunto de caracteres a utf8 (opcional)
$mysqli->set_charset("utf8");

// ... Puedes agregar más configuraciones o funciones aquí según tus necesidades ...
