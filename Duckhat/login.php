<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Conectar a la base de datos (reemplaza 'tu_servidor', 'tu_usuario', 'tu_contraseña' y 'tu_base_de_datos' con los valores correctos)
    $conn = new mysqli('localhost', 'root', '1234', 'users');

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consultar la base de datos para verificar las credenciales del usuario
    $query = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario con el correo electrónico dado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verificar la contraseña
        if (password_verify($password, $hashed_password)) {
            // Las credenciales son correctas, iniciar sesión
            $_SESSION['email'] = $email;

            // Redirigir al usuario a otra página después de iniciar sesión (por ejemplo, dashboard.php)
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $email; // O el nombre de usuario correspondiente, dependiendo de tu estructura de base de datos
            header("Location: index.php");
            exit();
        } else {
            // Contraseña incorrecta
            $_SESSION['error'] = "Contraseña incorrecta";
            header("Location: login.php");
            exit();
        }
    } else {
        // Usuario no encontrado en la base de datos
        $_SESSION['error'] = "Usuario no encontrado";
        header("Location: login.php");
        exit();
    }

    // Cerrar la conexión y la declaración
    $stmt->close();
    $conn->close();
}

// Resto de tu código HTML aquí (formulario de inicio de sesión)
?>
