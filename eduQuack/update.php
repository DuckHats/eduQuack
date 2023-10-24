<?php
session_start();
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_SESSION['id']; // Obtener el ID del usuario de la sesión

    $username = $_POST["username"];
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    // echo $username;
    // echo $full_name;
    // echo $email;
    // echo $id;
    // exit();
    // Consulta SQL para actualizar los valores
    $sql = "UPDATE usuarios SET email = ?, full_name = ?, username = ?, WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        // Especifica los tipos de datos de las variables en el primer argumento de bind_param
        $stmt->bind_param("sssi", $email, $full_name, $username, $id);
        
        if ($stmt->execute()) {
            echo "Registro actualizado correctamente.";
            header("Location: perfil.php");
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
