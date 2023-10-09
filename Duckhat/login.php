<?php
include('config.php'); // Incluye el archivo de configuración de la base de datos

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conectar a la base de datos
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Verificar las credenciales en la base de datos
    $sql = "SELECT * FROM usuarios WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: bienvenido.php"); // Redirige a la página de bienvenida después del inicio de sesión exitoso
            exit();
        } else {
            echo "Nombre de usuario o contraseña incorrectos";
        }
    } else {
        echo "Nombre de usuario o contraseña incorrectos";
    }

    // Cerrar la conexión
    $conn->close();
}
?>
