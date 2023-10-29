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
    <title>Detalls del Post</title>
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
            <p>No s'ha trobat informació del post.</p>
        <?php endif; ?>
        
        <a href="Blog.php">Tornar a la pàgina de blogs:</a>
    </div>
</body>
<footer>
        <a href="../eduQuack/Legal/License.pdf">Tots els drets reservats a eduQuack</a>
        <p>Contactens per correu a: <a href="mailto:duck4hats@gmail.com">duck4hats@gmail.com</a></p>
    </footer>
</html>
