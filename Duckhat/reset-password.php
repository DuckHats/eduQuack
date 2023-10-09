<?php
// Include config file
require_once "config.php";

// Verifica si el correo electrónico y el token están presentes en la URL
if(isset($_GET["email"]) && isset($_GET["token"])){
    // Obtiene el correo electrónico y el token de la URL
    $email = $_GET["email"];
    $token = $_GET["token"];

    // Verifica si el token es válido
    $sql = "SELECT id FROM users WHERE email = ? AND reset_token = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_token);
        $param_email = $email;
        $param_token = $token;
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){
                // El token es válido, permite al usuario restablecer la contraseña
                // Aquí puedes agregar el código HTML y JavaScript para mostrar el formulario de restablecimiento de contraseña
                // También necesitarás manejar la lógica del lado del servidor cuando el formulario se envíe (similar al código que proporcioné anteriormente en reset-password.php)
            } else{
                // Token no válido, redirige a una página de error o muestra un mensaje de error
                echo "Token inválido. Por favor, solicita un nuevo enlace para restablecer la contraseña.";
            }
        } else{
            echo "Oops! Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
        }
        mysqli_stmt_close($stmt);
    }
} else{
    // Si el correo electrónico o el token no están presentes en la URL, redirige a una página de error o muestra un mensaje de error
    echo "Parámetros incorrectos. Por favor, sigue el enlace proporcionado en tu correo electrónico.";
}

// Cierra la conexión
mysqli_close($link);
?>
