<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenir les dades del formulari i escapar-les
    $email = $mysqli->real_escape_string($_POST['email']);
    $full_name = $mysqli->real_escape_string($_POST['full_name']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $id = $mysqli->real_escape_string($_SESSION['id']);

    // Preparar i executar la consulta d'actualització
    $sql = "UPDATE usuarios SET email = ?, full_name = ?, username = ? WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        // Especificar els tipus de dades dels paràmetres en el primer argument de bind_param
        $stmt->bind_param("sssi", $email, $full_name, $username, $id);
        
        if ($stmt->execute()) {
            echo "Registre actualitzat correctament.";
            header("Location: perfil.php");
            exit();
        } else {
            echo "Error en l'actualització del registre: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparació de la consulta: " . $mysqli->error;
    }
} else {
    echo "Petició incorrecta.";
}

$mysqli->close();
