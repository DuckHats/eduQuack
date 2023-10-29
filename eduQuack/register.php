<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "config.php"; // Reemplaza "config.php" con el nombre de tu archivo de configuración de la base de datos

    // Validar otros campos aquí (como se mencionó en las respuestas anteriores)

    // Hash de la contraseña
    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Manejar el archivo de imagen
    $targetDirectory = "./uploads/";
    $targetFile = $targetDirectory . uniqid() . "_" . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // ... (verificaciones y validaciones de imagen como se discutió anteriormente)

    if ($uploadOk == 0) {
        echo "El archivo no se pudo cargar.";
    } else {
        // Intentar subir el archivo al servidor
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
            // Insertar datos en la base de datos
            $sql = "INSERT INTO usuarios (username, curso, full_name, email, password, edad, profile_picture) VALUES (?, ?, ?, ?, ?, ?, ?)";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("ssssiss", $username, $curso, $full_name, $email, $hashed_password, $edad, $targetFile);

                // Obtener valores de los campos del formulario
                $username = $_POST["username"];
                $curso = $_POST["curso"];
                $full_name = $_POST["full_name"];
                $email = $_POST["email"];
                $edad = $_POST["edad"];

                if ($stmt->execute()) {
                    header("location: login.html");
                    exit();
                } else {
                    echo "Error al registrar el usuario.";
                }

                $stmt->close();
            } else {
                echo "Error en la preparación de la consulta.";
            }
        } else {
            echo "Hubo un error al cargar el archivo.";
        }
    }

    $mysqli->close();
}
?>
