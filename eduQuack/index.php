<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenido | eduQuack</title>
    <link rel="icon" href="images/ginebro-logo (1).png">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <menu>
        <img src="images/ginebro-logo (1).png">
        <ul>
            <li><a href="index.php"><h3 class="negrita">Menú</h3></a></li>
            <li><a href="teams.php"><h3>Grupos</h3></a></li>
            <li><a href="news.php"><h3>Noticias</h3></a></li>
            <li><a href="perfil.php"><img id="conficon" src="images/user.png"></a></li>
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
            <iframe width="445" height="229" src="https://w2.countingdownto.com/5039351" frameborder="0"></iframe>


        </div>
    </main>
    
    <footer>
        <a href="../eduQuack/Legal/License.pdf">Todos los derechos reservados a eduQuack</a>
        <p>Contáctenos en el correo <a href="mailto:example@ginebro.cat">example@ginebro.cat</a></p>
    </footer>

</body>

</html>
