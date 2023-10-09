<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
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
            // Inicio de sesión exitoso, redirigir al usuario a la página de bienvenida
            header("Location: bienvenido.php");
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