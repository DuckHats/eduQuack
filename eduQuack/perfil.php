<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuració | eduQuack</title>
    <link rel="icon" href="images/ginebro-logo (1).png">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <?php
    session_start();
    include('config.php');

    // Comprobar si el usuario ha iniciado sesión
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.html");
        exit;
    }

    // Obtener datos del usuario desde la base de datos
    $id = $_SESSION['id'];
    $sql = "SELECT email, full_name, username FROM usuarios WHERE id = '$id'";
    $result = $mysqli->query($sql);
    //Guardar la informació en variables
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $username = $user['username'];
        $email = $user['email'];
        $full_name = $user['full_name'];
    }
    ?>

    <menu>
        <img src="images/ginebro-logo (1).png">
        <ul>
            <li><a href="./index.php">
                    <h3>Home</h3>
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
            <li><a href="./perfil.php"><img id="conficon" src="images/userselec.png"></a></li>
        </ul>
    </menu>
    <main>
        <h2>Perfil</h2>
        <form action="update.php" method="post">
            <table id="perfil">
                <tr>
                    <td>
                        <h3>Nom Usuari:</h3>
                        <input type="text" name="username" value="<?= htmlspecialchars($username); ?>">
                    </td>
                    <td rowspan="2">
                    <img id="avatar" src="images/avatar.png" alt="avatar">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Nom complet:</h3>
                        <input type="text" name="full_name" value="<?= htmlspecialchars($full_name); ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 id="email">Email:</h3>
                        <input type="text" name="email" value="<?= htmlspecialchars($email); ?>">
                    </td>
                    <td rowspan="3"><img id="qr" src="images/qr.png" alt="Qr"></td>
                </tr>
                <tr>
                    <td>
                        <h3>ID d'usuari:</h3>
                        <input type="text" name="id_usuar" readonly value=<?= $id?>>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Bienvenido session:</h3>
                        <input type="text" name="id_usuar" readonly value=<?php echo htmlspecialchars($_SESSION["id"]); ?>>
                    </td>
                </tr>
                <tr>
                   <td><input type="submit" value="Actualitzar">

            </form>
                    <td>
                    <input type="hidden" name="logout" value="true">
                    <input id="logout" type="submit" value="logout">
                    </td>
                </tr>
            </form>
            </table>
    </main>

<!-- Popup para confirmar logout -->
<div id="popup-logout-content" style="display: none;">
    <form action="logout.php" method="post">
        <h2>¿Estás seguro que deseas cerrar la sesión?</h2>
        <input type="button" value="Yes">
        <input id="close-button" type="button" value="No">
    </div>

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
            <h2>Section</h2>
            <ul>
                <li ><a href="#" >Home</a></li>
                <li ><a href="#" >Features</a></li>
                <li ><a href="#" >Pricing</a></li>
                <li ><a href="#" >FAQs</a></li>
                <li ><a href="#" >About</a></li>
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