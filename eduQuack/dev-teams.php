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
    <title>Grups | eduQuack</title>
    <link rel="icon" href="images/ginebro-logo (1).png">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Script pop up -->
</head>

<body>

    <menu>
        <img src="images/ginebro-logo (1).png">
        <ul>
            <li><a href="./index.php"><h3>Home</h3></a></li>
            <li><a href="./dev-teams.php" class="negrita"><h3>Grups</h3></a></li>
            <li><a href="./news.php"><h3>Notícies</h3></a></li>
            <li><a href="./Foro/Blog.php"><h3>Forum</h3></a></li>
            <li><a href="./formularis.php"><h3>Valoracións</h3></a></li>
            <li><a href="./perfil.php"><img id="conficon" src="images/user.png"></a></li>
        </ul>  
    </menu>
    
    <main>
        <h1>Notetats!!!</h1>
        <div>
            <p>En aquesta pàgina podreu tobar una plataforma per crear grups i xats privats amb la resta d'usuaris de la plataforma i de l'escola.
            Estarà tot disponible a partir de la pròxima actualització. 
            </p>
            <a href="./index.php">HOME</a>
        </div>
    </main>
    
    <footer>
        <a href="../eduQuack/Legal/License.pdf">Tots els drets reservats a eduQuack</a>
        <p>Contactens per correu a: <a href="mailto:duck4hats@gmail.com">duck4hats@gmail.com</a></p>
    </footer>

</body>

</html>
