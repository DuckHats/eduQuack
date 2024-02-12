<?php
require_once('blog_database.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $post_id = $_GET["id"];

    $sql = "SELECT * FROM posts WHERE id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        $titulo = $post["title"];
        $contenido = $post["content"];
        $autor = $post["author"];
        $imagen_path = $post["image_path"];
    } else {
        echo "Post no encontrado";
    }
} else {
    echo "ID de post no válido";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Post</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <?php if (isset($titulo)) : ?>
            <h1><?= $titulo ?></h1>
            <p>Autor: <?= $autor ?></p>
            <p><?= $contenido ?></p>
            <?php if ($imagen_path) : ?>
                <img src="<?= $imagen_path ?>" alt="Imagen del post">
            <?php endif; ?>
        <?php else : ?>
            <p>No se encontró información del post.</p>
        <?php endif; ?>
        
        <a href="Blog.php">Volver al Blog</a>
    </div>
</body>

</html>
