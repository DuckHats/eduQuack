<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: noticia.php");
    exit;
}

require_once('news_database.php');

// Obtén datos del formulario
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecha = $_POST['fecha'];
$curso = $_POST['curso'];

// Consulta preparada para insertar datos en la tabla noticias
$sql = "INSERT INTO noticias (titulo, contenido, fecha, curso) VALUES (?, ?, ?, ?)";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("ssss", $titulo, $contenido, $fecha, $curso);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        echo "Noticia añadida correctamente. <a href='formulario_noticias.php'>Volver</a>";
    } else {
        echo "Error al añadir la noticia: " . $stmt->error;
    }

    // Cierra la declaración
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
