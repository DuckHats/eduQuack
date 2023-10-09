<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y validar datos del formulario
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

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
            // Inicio de sesión exitoso, almacena la información del usuario en la sesión
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['curso_id'] = $row['curso_id']; // Suponiendo que hay un campo 'curso_id' en tu tabla de usuarios

            // Redirigir al usuario a la página de noticias después del inicio de sesión exitoso
            header("Location: news.html");
            exit();
        } else {
            // Contraseña incorrecta, redirigir de vuelta a la página de inicio de sesión con un mensaje de error
            header("Location: login.html?error=incorrecto");
            exit();
        }
    } else {
        // Usuario no encontrado, redirigir de vuelta a la página de inicio de sesión con un mensaje de error
        header("Location: login.html?error=incorrecto");
        exit();
    }

    // Cerrar la conexión
    $conn->close();
}
?>
