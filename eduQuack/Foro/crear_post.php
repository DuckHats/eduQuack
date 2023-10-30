<?php
session_start();
require_once('blog_database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    $autor = $_SESSION["username"];

    // Verificar si se ha subido un archivo de imagen (puedes agregar más validaciones aquí)
    if ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
        $imagen_path = "uploads/images/" . $_FILES["imagen"]["name"];
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagen_path);
    } else {
        $imagen_path = ""; // Si no se subió una imagen, asigna un valor predeterminado o una cadena vacía
    }

    // Insertar el post en la base de datos
    $sql = "INSERT INTO posts (title, content, image_path, author) VALUES ('$titulo', '$contenido', '$imagen_path', '$autor')";

    if ($conn->query($sql) === TRUE) {
        header("Location: Blog.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
