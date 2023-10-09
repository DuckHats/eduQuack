<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email']) || !isset($_SESSION['curso_id'])) {
    header("Location: login.html");
    exit();
}

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$cursoId = $_SESSION['curso_id'];
$sql = "SELECT titulo, descripcion, enlace FROM noticias WHERE curso_id = '$cursoId'";
$result = $conn->query($sql);

$noticias = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($noticias);

$conn->close();
?>
