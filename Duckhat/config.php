<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "users";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Configurar PDO para manejar errores en el modo excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // No necesitas imprimir "Conexión establecida correctamente" aquí
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
