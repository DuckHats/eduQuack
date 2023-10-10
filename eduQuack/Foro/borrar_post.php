<?php
require_once('database.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $post_id = $_GET["id"];

    // Eliminar el post de la base de datos
    $sql = "DELETE FROM posts WHERE id = $post_id";

    if ($conn->query($sql) === TRUE) {
        // Redirigir de vuelta a la página del blog después de eliminar el post
        header("Location: Blog.php");
    } else {
        echo "Error al eliminar el post: " . $conn->error;
    }
} else {
    echo "Solicitud inválida";
}
?>
