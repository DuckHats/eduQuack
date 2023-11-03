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

    <h1 class="my-5">Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido a nuestro sitio.</h1>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION["id"]); ?>!</h1>

    <main>
        <!-- Contenido personalizado para la página de bienvenida -->
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
                <a href="./view/Política_us.pdf">Politiques d'us</a>
                <a href="./view/Política_de_privacitat.pdf">Politiques de Privacitat</a>
                <button id="accept-button">Aceptar</button>
            </div>
        </div>
        <!-- Pop up js -->
    </main>

    <footer>
        <section>
            <div>
            <h5>Section</h5>
            <ul>
                <li ><a href="#" >Home</a></li>
                <li ><a href="#" >Features</a></li>
                <li ><a href="#" >Pricing</a></li>
                <li ><a href="#" >FAQs</a></li>
                <li ><a href="#" >About</a></li>
            </ul>
            </div>
            <div>
            <h5>Section</h5>
            <ul>
                <li ><a href="#" >Home</a></li>
                <li ><a href="#" >Features</a></li>
                <li ><a href="#" >Pricing</a></li>
                <li ><a href="#" >FAQs</a></li>
                <li ><a href="#" >About</a></li>
            </ul>
            </div>
            <div>
                <h4>Subscribe to our newsletter</h4>
                <p>Monthly digest of what's new and exciting from us.</p>
                <label>Email address</label>
                <input  type="text" placeholder="Email address">
                <button type="button">Subscribe</button>
            </div>
        </section>
        <div>
        <p>&copy; 2023 DuckHats. All rights reserved.</p>
        <p>Contactens per correu a: <a href="mailto:duck4hats@gmail.com">duck4hats@gmail.com</a></p>
        </div>
    </footer>


</body>

</html>
