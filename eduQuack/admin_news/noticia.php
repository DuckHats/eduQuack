<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: noticia.php");
    exit;
}

require_once('../config.php');

// Obtén datos del formulario
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecha = $_POST['fecha'];
$curso_id = $_POST['curso']; // Cambia el nombre de la variable para evitar confusiones

// Consulta preparada para insertar datos en la tabla noticia
$sql = "INSERT INTO noticia (titulo, contenido, fecha, id_curso) VALUES (?, ?, ?, ?)";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("sssi", $titulo, $contenido, $fecha, $curso_id);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        echo "Noticia añadida correctamente. <a href='formulario_noticias.php'>Volver</a>";
    } else {
        echo "Error al añadir la noticia: " . $stmt->error;
    }

    // Cierra la declaración
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $mysqli->error;
}

// Cierra la conexión a la base de datos
$mysqli->close();
