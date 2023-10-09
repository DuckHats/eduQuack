<?php
// Inicia una nueva sesión o reanuda la sesión existente
session_start();

// Incluye el archivo de configuración de la base de datos
include('config.php');

// Verifica si el formulario ha sido enviado con el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario (nombre de usuario, correo electrónico, fecha de nacimiento, contraseña y curso)
    $username = $_POST['email'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Cifra la contraseña usando el algoritmo bcrypt
    $cursoId = $_POST['curso_id'];

    // Conectar a la base de datos usando los datos de configuración
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Verificar la conexión a la base de datos
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Guardar los datos en la base de datos mediante una consulta SQL
    $sql = "INSERT INTO usuarios (username, email, fecha_nacimiento, password, curso_id) VALUES ('$username', '$email', '$fecha_nacimiento', '$password', '$cursoId')";

    // Ejecutar la consulta SQL y verificar si se ejecuta correctamente
    if ($conn->query($sql) === TRUE) {
        // Inicializa la sesión y almacena datos del usuario
        $_SESSION['email'] = $email;
        $_SESSION['curso_id'] = $cursoId;

        // Redirige al usuario a la página de inicio después del registro exitoso
        header("Location: index.html");
        exit();
    } else {
        // Si hay un error en la consulta SQL, redirige a la página de registro con un mensaje de error
        header("Location: registro.html?error=incorrecto");
        exit();
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>
