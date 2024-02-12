<?php
// Inicia la sesión en cada página donde necesitas verificar el rol de administrador
session_start();

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // Verifica si el usuario tiene el rol de administrador
    if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
        // El usuario tiene el rol de administrador, muestra funciones extras para administradores
        echo "¡Bienvenido, administrador! Aquí están las funciones extras:";
        echo '<a href="borrar_post.php?id=' . $row["id"] . '">Eliminar</a>';
        // Coloca aquí el código HTML o funciones adicionales para administradores
    } else {
        // El usuario no tiene el rol de administrador, muestra funciones estándar para usuarios normales
        echo "¡Bienvenido! Aquí están las funciones estándar:";
        // Coloca aquí el código HTML o funciones para usuarios normales
    }
} else {
    // El usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("location: login.html");
    exit();
}



require_once('blog_database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    $autor = $_SESSION["username"];

    if ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
        $imagen_path = "uploads/images/" . $_FILES["imagen"]["name"];
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagen_path);
    } else {
        $imagen_path = "";
    }

    $sql = "INSERT INTO posts (title, content, image_path, author) VALUES ('$titulo', '$contenido', '$imagen_path', '$autor')";

    if ($conn->query($sql) === TRUE) {
        header("Location: Blog.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | eduQuack</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <menu>
        <img src="../images/ginebro-logo (1).png">
        <ul>
            <li><a href="../index.php"><h3>Home</h3></a></li>
            <li><a href="../teams.php"><h3>Grupos</h3></a></li>
            <li><a href="../news.php"><h3>Noticias</h3></a></li>
            <li><a href="./Blog.php"><h3  class="negrita">Forum</h3></a></li>
            <li><a href="../formularis.php"><h3>Valoracións</h3></a></li>
            <li><a href="../perfil.php"><img id="conficon" src="../images/user.png"></a></li>
        </ul>  
    </menu>
    <main>
    <div class="container">
        <h1>eduQuack Blog</h1>

        <!-- Formulario para crear un nuevo post -->
        <h2>New Post</h2>
        <form action="Blog.php" method="post" enctype="multipart/form-data">
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
            <!-- Botón para eliminar el post (envía el ID del post a través de la URL) -->
            <a href="borrar_post.php?id=<?= $row["id"] ?>">Eliminar</a>
                
                <!-- Enlace para ver más detalles del post -->
                <a href="thread.php?id=<?= $row["id"] ?>">Ver Más</a>
                
                <h1><?= $row["title"] ?></h1>
                <p>Autor: <?= $row["author"] ?></p>
                <p><?= $row["content"] ?></p>
                <?php if ($row["image_path"]) : ?>
                    <img src="<?= $row["image_path"] ?>" alt="Imagen del post">
                <?php endif; ?>
                
                
            </div>
        <?php endwhile; ?>
    </div>
    </main>
    <footer>
        <a href="../eduQuack/Legal/License.pdf">Todos los derechos reservados a eduQuack</a>
        <p>Contáctenos en el correo <a href="mailto:example@ginebro.cat">example@ginebro.cat</a></p>
    </footer>
</body>

</html>