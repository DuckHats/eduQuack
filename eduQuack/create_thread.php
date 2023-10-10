<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "1234", "foro");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$title = $_POST['title'];
$content = $_POST['content'];

// Insertar el nuevo hilo en la base de datos
$sql = "INSERT INTO threads (title, content) VALUES ('$title', '$content')";
if ($conn->query($sql) === TRUE) {
    header("Location: index.html"); // Redirigir a la página principal
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
