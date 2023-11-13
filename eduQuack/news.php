<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.html");
    exit;
}

require_once('config.php');

// Crea la conexión
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener todas las noticias
$sql = "SELECT titulo, contenido, fecha FROM noticia";
$result = $conn->query($sql);

// Array para almacenar las noticias
$noticias = [];

// Obtener todas las noticias y guardarlas en el array $noticias
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Configuración de la codificación de caracteres y el tamaño de la ventana de visualización -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página y enlace al icono en la pestaña del navegador -->
    <title>News | eduQuack</title>
    <link rel="icon" href="images/ginebro-logo (1).png">
    <!-- Enlace al archivo de estilos CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- Menú de navegación -->
    <menu>
        <img src="images/ginebro-logo (1).png">
        <ul>
            <!-- Enlaces a otras páginas del sitio web -->
            <li><a href="./index.php">
                    <h3>Home</h3>
                </a></li>
            <li><a href="./dev-teams.php">
                    <h3>Grups</h3>
                </a></li>
            <li><a href="./news.php">
                    <h3 class="negrita">Notícies</h3>
                </a></li>
            <li><a href="./Foro/Blog.php">
                    <h3>Forum</h3>
                </a></li>
            <li><a href="./formularis.php">
                    <h3>Valoracións</h3>
                </a></li>
            <li><a href="./perfil.php"><img id="conficon" src="images/user.png"></a></li>
        </ul>
    </menu>
    <main>
        <!-- Contenedor para mostrar las noticias dinámicamente -->
        <div id="noticias-container"></div>
        <?php foreach ($noticias as $noticia) : ?>
            <div class="noticia">
                <h1><?php echo htmlspecialchars($noticia['titulo']); ?></h1>
                <p><?php echo htmlspecialchars($noticia['contenido']); ?></p>
                <p>Fecha: <?php echo htmlspecialchars($noticia['fecha']); ?></p>
            </div>
        <?php endforeach; ?>

        <!-- Código JavaScript para cargar dinámicamente las noticias usando AJAX -->
    </main>
    <!-- Pie de página -->
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
            <h2>Politics</h2>
            <ul>
                <li ><a href="./view/Política_de_privacitat.md" >Política de privacitat</a></li>
                <li ><a href="./view/Política_us.md" >Politiques d'ús</a></li>
                <li ><a href="./view/Reglamento_General_de_Protección_de_Datos(RGPD).md" >RGPD</a></li>
                <li ><a href="./view/LICENSE" >Llicencia</a></li>
                <li ><a href="./faq.php" >FAQ</a></li>
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
            <li><a href="https://twitter.com/Hats4Ducks"><img src="./images/twitter (1).png" alt="Twitter"></a></li>
            <li><a href=""><img src="./images/instagram (1).png" alt="Instagram"></a></li>
            <li><a href="https://duckhats.github.io/"><img src="./images/github (1).png" alt="Github"></a></li>
        </ul>
        </div>
    </footer>
</body>

</html>