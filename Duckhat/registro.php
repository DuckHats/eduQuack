<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $username = $_POST['email'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Cifra la contraseña
    $cursoId = $_POST['curso_id'];

    // Conectar a la base de datos
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Guardar los datos en la base de datos
    $sql = "INSERT INTO usuarios (username, email, fecha_nacimiento, password, curso_id) VALUES ('$username', '$email', '$fecha_nacimiento', '$password', '$cursoId')";

    if ($conn->query($sql) === TRUE) {
        // Inicializa la sesión y almacena datos del usuario
        $_SESSION['email'] = $email;
        $_SESSION['curso_id'] = $cursoId;

        // Redirige al usuario a la página de noticias después del registro exitoso
        header("Location: index.html");
        exit();
    } else {
        // Si hay un error en la consulta SQL, redirige a la página de registro con un mensaje de error
        header("Location: registro.html?error=incorrecto");
        exit();
    }

    // Cerrar la conexión
    $conn->close();
}
?>
