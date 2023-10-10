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
        header("Location: blog.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Blog</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Mi Blog</h1>

        <!-- Formulario para crear un nuevo post -->
        <h2>Nuevo Post</h2>
        <form action="blog.php" method="post" enctype="multipart/form-data">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required><br>
            <label for="contenido">Contenido:</label><br>
            <textarea id="contenido" name="contenido" rows="4" cols="50" required></textarea><br>
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen"><br>
            <input type="submit" value="Publicar">
        </form>

        <!-- Mostrar los posts del blog -->
        <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="post">
                <h2><?= $row["title"] ?></h2>
                <p>Autor: <?= $row["author"] ?></p>
                <p><?= $row["content"] ?></p>
                <?php if ($row["image_path"]) : ?>
                    <img src="<?= $row["image_path"] ?>" alt="Imagen del post">
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>
