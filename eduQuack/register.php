<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "config.php"; // Reemplaza "config.php" con el nombre de tu archivo de configuración de la base de datos

    // Otros campos del formulario
    $username = $_POST["username"];
    $curso = $_POST["curso"];
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $edad = $_POST["edad"];

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Manejar el archivo de imagen
    $targetDirectory = "uploads/"; // Directorio donde se guardarán las imágenes
    $targetFile = $targetDirectory . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verificar si el archivo es una imagen real o una imagen falsa
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "El archivo no es una imagen válida.";
            $uploadOk = 0;
        }
    }

    // Verificar si el archivo ya existe
    if (file_exists($targetFile)) {
        echo "El archivo ya existe.";
        $uploadOk = 0;
    }

    // Verificar el tamaño del archivo (en este ejemplo, se limita a 9MB)
    if ($_FILES["profile_picture"]["size"] > 9000000) {
        echo "El archivo es demasiado grande. Por favor, elige un archivo más pequeño.";
        $uploadOk = 0;
    }

    // Permitir solo ciertos formatos de archivo (puedes modificarlo según tus necesidades)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Solo se permiten archivos JPG, JPEG y PNG.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk está configurado como 0 por un error
    if ($uploadOk == 0) {
        echo "El archivo no se pudo cargar.";
    } else {
        // Intentar subir el archivo al servidor
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
            // Insertar datos en la base de datos
            $sql = "INSERT INTO usuarios (username, curso, full_name, email, password, edad, profile_picture) VALUES (?, ?, ?, ?, ?, ?, ?)";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("sssssis", $username, $curso, $full_name, $email, $hashed_password, $edad, $targetFile);

                if ($stmt->execute()) {
                    header("location: login.html");
                } else {
                    echo "Error al registrar el usuario.";
                }

                $stmt->close();
            }
        } else {
            echo "Hubo un error al cargar el archivo.";
        }
    }

    $mysqli->close();
}
?>
