<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Blog | eduQuack</title>
    <link rel="icon" href="../images/ginebro-logo (1).png">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <menu>
        <img src="images/ginebro-logo (1).png">
        <ul>
            <li><a href="../index.php"><h3 class="negrita">Menú</h3></a></li>
            <li><a href="../teams.php"><h3>Grupos</h3></a></li>
            <li><a href="../news.php"><h3>Noticias</h3></a></li>
            <li><a href="./Foro/Blog.php"><h3>Foro</h3></a></li>
            <li><a href="../perfil.php"><img id="conficon" src="../images/user.png"></a></li>
        </ul>
    </menu>

    <h1 class="my-5">Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido a nuestro blog.</h1>

    <main>
        <!-- Contenido personalizado para la página de bienvenida -->
        <div class="welcome-message">
            <h1>¡Bienvenido a nuestro blog, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
            <p>¡Gracias por iniciar sesión en eduQuack! Explora y comparte tus pensamientos con la comunidad.</p>
            <!-- Puedes agregar más contenido personalizado aquí según tus necesidades -->

            <!-- Formulario para crear un nuevo post -->
            <h2>Nuevo Post</h2>
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
            <?php foreach ($noticias as $noticia): ?>
                <div class="post">
                    <h2><?php echo htmlspecialchars($noticia['titulo']); ?></h2>
                    <p>Autor: <?php echo htmlspecialchars($noticia['autor']); ?></p>
                    <p><?php echo htmlspecialchars($noticia['contenido']); ?></p>
                    <?php if (!empty($noticia['imagen_path'])): ?>
                        <img src="<?php echo htmlspecialchars($noticia['imagen_path']); ?>" alt="Imagen del post">
                    <?php endif; ?>

                    <!-- Botón para eliminar el post (envía el ID del post a través de la URL) -->
                    <a href="borrar_post.php?id=<?php echo $noticia['id']; ?>">Eliminar</a>

                    <!-- Enlace para ver más detalles del post -->
                    <a href="thread.php?id=<?php echo $noticia['id']; ?>">Ver Más</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <a href="../eduQuack/Legal/License.pdf">Todos los derechos reservados a eduQuack</a>
        <p>Contáctenos en el correo <a href="mailto:example@ginebro.cat">example@ginebro.cat</a></p>
    </footer>

</body>

</html>
