<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido | Duckhat</title>
    <link rel="icon" href="images/ginebro-logo (1).png">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <menu>
        <img src="images/ginebro-logo (1).png">
        <ul>
            <li><a href="index.php"><h3 class="negrita">Menú</h3></a></li>
            <li><a href="teams.html"><h3>Grups</h3></a></li>
            <li><a href="news.html"><h3>Notícies</h3></a></li>
            <li><a href="perfil.php"><img id="conficon" src="images/user.png"></a></li>
        </ul>  
    </menu>
    
    <h1 class="my-5">Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido a nuestro sitio.</h1>

    <main>
        <!-- Contenido personalizado para la página de bienvenida -->
        <div class="welcome-message">
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
            <p>¡Gracias por iniciar sesión en Duckhat! ¡Disfruta explorando nuestro sitio!</p>
            <!-- Puedes agregar más contenido personalizado aquí según tus necesidades -->
        </div>
    </main>
    
    <footer>
        <a href="../Duckhat/Legal/License.pdf">Todos los derechos reservados a Duckhat</a>
        <p>Contáctenos en el correo <a href="mailto:example@ginebro.cat">example@ginebro.cat</a></p>
    </footer>

</body>

</html>
