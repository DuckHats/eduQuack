<?php
session_start();
include('config.php');

if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$cursoId = $_SESSION['curso_id'];
$sql = "SELECT titulo, descripcion, enlace FROM noticias WHERE curso_id = '$cursoId'";
$result = $conn->query($sql);

$noticias = array();

if ($result->num_rows > 0) {
    // $row = $result->fetch_assoc();
    while ($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($noticias);

$conn->close();
?>
