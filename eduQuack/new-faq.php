<?php
// Función para verificar el rol del usuario (administrador/moderador)
function esUsuarioAdministrador() {
    // Implementa la lógica para verificar si el usuario es administrador/moderador
    return true; // Cambia esto según tus necesidades
}

// Conexión a la base de datos (reemplázalo con tus propios datos de conexión)
session_start();
include('./config.php');

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.html");
    exit;
}

// Manejo del formulario de nueva noticia
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["titulo"]) && isset($_POST["contenido"])) {
        $titulo = $mysqli->real_escape_string($_POST["titulo"]);
        $contenido = $mysqli->real_escape_string($_POST["contenido"]);
        $sql = "INSERT INTO faq (titulo, contenido) VALUES ('$titulo', '$contenido')";
        if ($mysqli->query($sql) === TRUE) {
            echo "Noticia creada con éxito.";
        } else {
            echo "Error al crear la noticia: " . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear faq - Eduquack</title>
</head>
<body>
    <h1>Crear faq - Eduquack</h1>

    <!-- Formulario para crear una nueva noticia (solo visible para administradores) -->
    <?php if (esUsuarioAdministrador()) : ?>
        <form action="./faq.php" method="post">
            <label for="titulo">Título de la noticia:</label>
            <input type="text" name="titulo" required>
            <label for="contenido">Contenido de la noticia:</label>
            <textarea name="contenido" rows="4" cols="50" required></textarea>
            <input type="submit" value="Crear Noticia">
        </form>
    <?php endif; ?>

    <?php
    // Cierra la conexión a la base de datos al finalizar
    $mysqli->close();
    ?>
</body>
</html>
