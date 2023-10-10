<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['id']; // Obtener el ID del usuario de la sesión
    $username = $_POST["username"];
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];

    // Consulta SQL para actualizar los valores
    $sql = "UPDATE usuarios SET username = ?, full_name = ?, email = ? WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("sssi", $username, $full_name, $email);
        var_dump($stmt);
        // echo "Pr if";
        if ($stmt->execute()) {
            echo "Registro actualizado correctamente.";
            // header("Location: perfil.php");
            exit();
        } else {
            echo "Error al actualizar el registro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $mysqli->error;
    }
} else {
    echo "Petición incorrecta.";
}

$mysqli->close();
?>
