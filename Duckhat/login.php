<?php
// Incluye el archivo de configuración de la base de datos
include('config.php');

// Verifica si el formulario ha sido enviado con el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario (correo electrónico y contraseña)
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Conecta a la base de datos usando los datos de configuración
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Verifica la conexión a la base de datos
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta la base de datos para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    // Verifica si se encontró un usuario con el correo electrónico proporcionado
    if ($result->num_rows == 1) {
        // Obtiene los datos del usuario de la fila encontrada
        $row = $result->fetch_assoc();

        // Verifica si la contraseña proporcionada coincide con la almacenada en la base de datos
        if (password_verify($password, $row['password'])) {
            // Inicio de sesión exitoso, redirige al usuario a la página de bienvenida (index.html)
            header("Location: index.html");
            exit();
        } else {
            // Contraseña incorrecta, redirige de vuelta a la página de inicio de sesión con un mensaje de error
            header("Location: login.html?error=contrasena");
            exit();
        }
    } else {
        // Usuario no encontrado, redirige de vuelta a la página de inicio de sesión con un mensaje de error
        header("Location: login.html?error=usuario");
        exit();
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>
