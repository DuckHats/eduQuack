<?php
$servername = "localhost"; // Cambia esto si tu servidor de base de datos está en un host diferente
$username = "root"; // Nombre de usuario de la base de datos
$password = "1234"; // Contraseña de la base de datos
$database = "noticias_db"; // Nombre de la base de datos

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Establece el conjunto de caracteres a utf8 (opcional)
$conn->set_charset("utf8");

// ... Puedes agregar más configuraciones o funciones aquí según tus necesidades ...

?>
