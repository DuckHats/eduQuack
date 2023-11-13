<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Grups | eduQuack</title>
    <link rel="icon" href="images/ginebro-logo (1).png">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Script pop up -->
</head>

<body>

    <menu>
        <img src="images/ginebro-logo (1).png">
        <ul>
            <li><a href="./index.php">
                    <h3>Home</h3>
                </a></li>
            <li><a href="./dev-teams.php">
                    <h3  class="negrita">Grups</h3>
                </a></li>
            <li><a href="./news.php">
                    <h3>Notícies</h3>
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
        
    </main>
    
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