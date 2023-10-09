<?php
include('config.php'); // Incluye tu archivo de configuración de la base de datos

// Conectar a la base de datos
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener noticias basadas en curso_id (reemplaza 'curso1' con el valor correcto)
$cursoId = 'curso1'; // Valor de ejemplo, reemplázalo con el valor real del curso del usuario
$sql = "SELECT * FROM noticias WHERE curso_id = '$cursoId'";

$result = $conn->query($sql);

// Array para almacenar las noticias
$noticias = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Agrega cada fila de noticias al array
        $noticias[] = array(
            'titulo' => $row['titulo'],
            'descripcion' => $row['descripcion'],
            'enlace' => $row['enlace']
        );
    }
}

// Convierte el array de noticias a formato JSON y lo devuelve
header('Content-Type: application/json');
echo json_encode($noticias);

// Cerrar la conexión
$conn->close();
?>
