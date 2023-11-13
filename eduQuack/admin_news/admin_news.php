<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <title>Creador de news | eduQuack</title>
    <link rel="icon" href="../images/ginebro-logo (1).png">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: news_admin_login.html");
        exit;
    }
    ?>
    <div class="blog_post">
    <h2>Afegir notícies</h2>
    <form action="noticia.php" method="post">
        <label for="titulo">Títol:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="contenido">Contingut:</label>
        <textarea id="contenido" name="contenido" required></textarea><br>

        <label for="fecha">Data:</label>
        <input type="date" id="fecha" name="fecha" required><br>

        <label for="curso">Curs:</label>
        <select id="curso" name="curso" required>
            <option value="1ESO">1r_ESO</option>
            <option value="2ESO">2n_ESO</option>
            <option value="3ESO">3r_ESO</option>
            <option value="4ESO">4t_ESO</option>
            <option value="CicloMedio">Cicle_Mitjà</option>
            <option value="CicloSuperior">Cicle_Superior</option>
            <option value="Bachillerato">Batchillerat</option>
        </select><br>

        <!-- <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*"><br> -->
        <input type="submit" value="Guardar Noticia">
    </form>
    </div>
</body>
<footer>
        <section>
            <div>
            <h2>Links</h2>
            <ul>
                <li ><a href="../index.php" >Home</a></li>
                <li ><a href="../dev-teams.php" >Grups</a></li>
                <li ><a href="../news.php" >Notícies</a></li>
                <li ><a href="../Foro/Blog.php" >Forum</a></li>
                <li ><a href="../formularis.php" >Valoracións</a></li>
            </ul>
            </div>
               <div>
            <h2>Politics</h2>
            <ul>
                <li ><a href="../view/Política_de_privacitat.md" >Política de privacitat</a></li>
                <li ><a href="../view/Política_us.md" >Politiques d'ús</a></li>
                <li ><a href="../view/Reglamento_General_de_Protección_de_Datos(RGPD).md" >RGPD</a></li>
                <li ><a href="../view/LICENSE" >Llicencia</a></li>
                <li ><a href="../faq.php" >FAQ</a></li>
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
            <li><a href=""><img src="../images/twitter (1).png" alt="Twitter"></a></li>
            <li><a href=""><img src="../images/instagram (1).png" alt="Instagram"></a></li>
            <li><a href="https://duckhats.github.io/"><img src="../images/github (1).png" alt="Github"></a></li>
        </ul>
        </div>
    </footer>

</html>