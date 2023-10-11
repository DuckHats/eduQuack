<?php
require_once('database.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $post_id = $_GET["id"];

    $sql = "DELETE FROM posts WHERE id = $post_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: blog.php");
    } else {
        echo "Error al eliminar el post: " . $conn->error;
    }
} else {
    echo "Solicitud inválida";
}
?>
