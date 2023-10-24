<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_GET["email"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    // Validar que les contrasenyes coincideixin
    if ($new_password === $confirm_password) {
        // Actualitzar la contrasenya a la base de dades
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt->bind_param("ss", $hashed_password, $email);

            if ($stmt->execute()) {
                // Contrasenya actualitzada amb èxit, redirigir a una pàgina de confirmació
                header("location: password-updated.php");
            } else {
                echo "Error en l'actualització de la contrasenya. Si us plau, intenta-ho més tard.";
            }

            $stmt->close();
        }
    } else {
        echo "Les contrasenyes no coincideixen. Torna enrere i intenta-ho de nou.";
    }

    // Tanca la connexió amb la base de dades
    mysqli_close($mysqli);
}
?>
