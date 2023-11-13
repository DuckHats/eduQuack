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
    <title>Benvingut | eduQuack</title>
    <link rel="icon" href="images/ginebro-logo (1).png">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Script pop up -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mostrar el popup cada vez que un usuario inicia sesión
            mostrarPopup();

            // Agregar un evento al botón de Aceptar
            document.getElementById('accept-button').addEventListener('click', function() {
                // Ocultar el popup
                ocultarPopup();

                // Marcar como aceptado
                localStorage.setItem('aceptado', 'true');
            });
        });

        function mostrarPopup() {
            // Verificar si se ha aceptado previamente
            if (!localStorage.getItem('aceptado')) {
                // Mostrar el popup
                document.getElementById('popup-container').style.display = 'block';
            }
        }

        function ocultarPopup() {
            // Ocultar el popup
            document.getElementById('popup-container').style.display = 'none';
        }
    </script>
    <!-- Final script pop up -->
</head>

<body>

    <menu>
        <img src="images/ginebro-logo (1).png">
        <ul>
            <li><a href="./index.php">
                    <h3 class="negrita">Home</h3>
                </a></li>
            <li><a href="./dev-teams.php">
                    <h3>Grups</h3>
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
        <!-- Contenido personalizado para la página de bienvenida -->
        <h1 class="my-5">Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido a nuestro sitio.</h1>
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION["id"]); ?>!</h1>
        <div class="welcome-message">
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
            <p>¡Gracias por iniciar sesión en eduQuack! ¡Disfruta explorando nuestro sitio!</p>
            <!-- Puedes agregar más contenido personalizado aquí según tus necesidades -->
        </div>
        <!-- Pop up js -->

        <div id="popup-container">
            <div id="popup">
                <h1>Polítiques de privacitat i condicions d'ús</h1>
                <p>Accepto les politiques de privacitat i em comprometo a seguir les normes d'us: </p>
                <ul>
                <li><a href="./view/Política_us.pdf">Politiques d'us</a></li>
                <li><a href="./view/Política_de_privacitat.pdf">Politiques de Privacitat</a></li>
                <li><button id="accept-button">Aceptar</button></li>
                </ul>
            </div>
        </div>
        <!-- Pop up js -->
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
