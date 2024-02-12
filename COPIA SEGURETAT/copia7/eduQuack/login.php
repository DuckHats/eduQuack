<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "config.php"; // Reemplaza "config.php" con el nombre de tu archivo de configuración de la base de datos

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta SQL para verificar el correo electrónico y la contraseña
    $sql = "SELECT id, username, password FROM usuarios WHERE email = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $username, $hashed_password);
                if ($stmt->fetch()) {
                    if (password_verify($password, $hashed_password)) {
                        // Iniciar sesión
                        session_start();
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                        $_SESSION['curso'] = $curso_id;

                        header("location: index.php");
                    } else {
                        header("location: login.html?error=incorrecto");
                    }
                }
            } else {
                header("location: login.html?error=incorrecto");
            }
        } else {
            echo "Error al intentar iniciar sesión.";
        }

        $stmt->close();
    }

    $mysqli->close();
}
?>
