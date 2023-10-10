<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "users";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario (teniendo en cuenta las validaciones)
    // ...

    // Preparar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO usuarios (username, curso_id, name, email, password, fecha_nacimiento) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $username, $curso_id, $name, $email, $hashed_password, $fecha_nacimiento);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Registro exitoso, redirigir al usuario a la página de login
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $email; // Asegúrate de tener la variable $username definida en este punto
        header("Location: index.php");
        exit();
    } else {
        // Error en la inserción
        echo "Error al registrar el usuario: " . $stmt->error;
    }

    // Cerrar la conexión y la declaración
    $stmt->close();
    $conn->close();
}
?>
