<?php
// Inicia una nueva sesión o reanuda la sesión existente
session_start();

// Incluye el archivo de configuración de la base de datos
include('config.php');

if (!isset($_SESSION['user_id'])) {
    // Si no ha iniciado sesión, redirige al usuario a la página de inicio de sesión
    header("Location: login.html");
    exit();
}
$user_id = $_SESSION['user_id'];

// Verifica si el usuario tiene una sesión válida
if (!isset($_SESSION['email']) || !isset($_SESSION['curso_id'])) {
    // Si no hay una sesión válida, redirige al usuario a la página de login
    header("Location: login.html");
    exit();
}

// Conectar a la base de datos usando los datos de configuración
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificar la conexión a la base de datos
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtiene el curso_id del usuario de la sesión
$cursoId = $_SESSION['curso_id'];

// Consulta SQL para obtener noticias basadas en curso_id
$sql = "SELECT * FROM noticias WHERE curso_id = '$cursoId'";

// Ejecuta la consulta SQL y almacena los resultados en $result
$result = $conn->query($sql);

// Array para almacenar las noticias
$noticias = array();

// Verifica si hay resultados en la consulta
if ($result->num_rows > 0) {
    // Itera sobre los resultados y agrega cada fila de noticias al array
    while ($row = $result->fetch_assoc()) {
        $noticias[] = array(
            'titulo' => $row['titulo'],
            'descripcion' => $row['descripcion'],
            'enlace' => $row['enlace']
        );
    }
}

// Establece el tipo de contenido de la respuesta como JSON
header('Content-Type: application/json');

// Convierte el array de noticias a formato JSON y lo imprime
echo json_encode($noticias);

// Cierra la conexión a la base de datos
$conn->close();
?>
