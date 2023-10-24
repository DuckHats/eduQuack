<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Comprovar si l'email existeix a la base de dades
    $sql = "SELECT id FROM users WHERE email = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // L'email existeix a la base de dades
            // Redirigir a una altra pàgina per reiniciar la contrasenya
            header("location: reset-password-form.php?email=$email");
        } else {
            // L'email no existeix a la base de dades
            echo "Aquest email no està registrat.";
        }

        $stmt->close();
    }
}
?>
