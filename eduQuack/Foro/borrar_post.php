<?php
require_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $post_id = $_GET["id"];

    $sql = "DELETE FROM blog WHERE id = $post_id";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: Blog.php");
    } else {
        echo "Error al eliminar el post: " . $mysqli->error;
    }
} else {
    echo "Solicitud inválida";
}
