<?php
require_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $post_id = $_GET["id"];

    $sql = "SELECT * FROM blog WHERE id = $post_id";
    $result = $mysqli->query($sql);

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
        <section>
            <div>
            <h2>Links</h2>
            <ul>
                <li ><a href="./index.php" >Home</a></li>
                <li ><a href="./dev-teams.php" >Grups</a></li>
                <li ><a href="./news.php" >Notícies</a></li>
                <li ><a href="./Foro/Blog.php" >Forum</a></li>
                <li ><a href="./formularis.php" >Valoracións</a></li>
            </ul>
            </div>
            <div>
            <h2>Section</h2>
            <ul>
                <li ><a href="#" >Home</a></li>
                <li ><a href="#" >Features</a></li>
                <li ><a href="#" >Pricing</a></li>
                <li ><a href="#" >FAQs</a></li>
                <li ><a href="#" >About</a></li>
            </ul>
            </div>
            <div id="newsletter">
                <h2>Subscriute al nostre newsletter</h2>
                <h4>Tota la informació sobre millores i actualitzacions del nostre sistema.</h4>
                <input  type="text" placeholder="Email address">
                <button type="submit">Subscribe</button>
                <p>Contactens per correu a: <a href="mailto:duck4hats@gmail.com">duck4hats@gmail.com</a></p>
            </div>
        </section>
        <div id="copyright">
        <p>&copy; 2023 DuckHats. All rights reserved.</p>
        <ul>
            <li><a href=""><img src="./images/twitter (1).png" alt="Twitter"></a></li>
            <li><a href=""><img src="./images/instagram (1).png" alt="Instagram"></a></li>
            <li><a href="https://duckhats.github.io/"><img src="./images/github (1).png" alt="Github"></a></li>
        </ul>
        </div>
    </footer>

</html>