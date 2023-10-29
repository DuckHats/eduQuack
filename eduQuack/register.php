<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "config.php"; // Reemplaza "config.php" con el nombre de tu archivo de configuración de la base de datos

    $username = $_POST["username"];
    $curso = $_POST["curso"];
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $edad = $_POST["edad"];

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (username, curso, full_name, email, password, edad) VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("sssssi", $username, $curso, $full_name, $email, $hashed_password, $edad);

        if ($stmt->execute()) {
            header("location: login.html");
        } else {
            echo "Error al registrar el usuario.";
        }

        $stmt->close();
    }

    $mysqli->close();
}
?>