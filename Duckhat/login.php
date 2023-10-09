<?php
session_start();
include('config.php'); // Incluye tu archivo de configuración de la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario (suponiendo que tienes campos 'email' y 'password')
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Conectar a la base de datos
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consultar la base de datos para verificar las credenciales
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Inicio de sesión exitoso, almacena el curso_id en la sesión
            $_SESSION['curso_id'] = $row['curso_id'];
            // Redirigir al usuario a la página de noticias
            header("Location: news.html");
            exit();
        } else {
            // Contraseña incorrecta, redirigir de vuelta a la página de inicio de sesión con un mensaje de error
            header("Location: login.html?error=contrasena");
            exit();
        }
    } else {
        // Usuario no encontrado, redirigir de vuelta a la página de inicio de sesión con un mensaje de error
        header("Location: login.html?error=usuario");
        exit();
    }

    // Cerrar la conexión
    $conn->close();
}
?>
