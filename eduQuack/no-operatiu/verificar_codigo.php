<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "config.php"; // Reemplaza "config.php" con el nombre de tu archivo de configuración de la base de datos

    $codigo = $_POST["codigo"];
    $email = $_POST["email"];

    // Verificar el código de verificación
    $sql_verificar_codigo = "SELECT * FROM codigos_verificacion WHERE email = ? AND codigo = ?";
    if ($stmt_verificar_codigo = $mysqli->prepare($sql_verificar_codigo)) {
        $stmt_verificar_codigo->bind_param("ss", $email, $codigo);
        $stmt_verificar_codigo->execute();
        $stmt_verificar_codigo->store_result();

        if ($stmt_verificar_codigo->num_rows > 0) {
            // Código de verificación válido, insertar usuario en la tabla de usuarios
            $sql_insert_usuario = "INSERT INTO usuarios (username, curso, full_name, email, password, edad) VALUES (?, ?, ?, ?, ?, ?)";
            if ($stmt_insert_usuario = $mysqli->prepare($sql_insert_usuario)) {
                // Obtener otros datos del formulario de registro
                $username = $_SESSION["username"];
                $curso = $_SESSION["curso"];
                $full_name = $_SESSION["full_name"];
                $password = $_SESSION["password"];
                $edad = $_SESSION["edad"];

                // Hash de la contraseña
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insertar datos del usuario
                $stmt_insert_usuario->bind_param("sssssi", $username, $curso, $full_name, $email, $hashed_password, $edad);
                $stmt_insert_usuario->execute();

                // Eliminar el código de verificación utilizado
                $sql_eliminar_codigo = "DELETE FROM codigos_verificacion WHERE email = ?";
                if ($stmt_eliminar_codigo = $mysqli->prepare($sql_eliminar_codigo)) {
                    $stmt_eliminar_codigo->bind_param("s", $email);
                    $stmt_eliminar_codigo->execute();
                }

                // Redirigir al usuario a la página de inicio de sesión
                header("location: login.html");
            } else {
                echo "Error al registrar el usuario.";
            }
        } else {
            echo "Código de verificación incorrecto. Por favor, inténtelo de nuevo.";
        }

        $stmt_verificar_codigo->close();
    } else {
        echo "Error al verificar el código de verificación.";
    }

    $mysqli->close();
}
?>
