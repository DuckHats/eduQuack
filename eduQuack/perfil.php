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

        <div id="infoconf">
            <h2>Perfil</h2>
            <form action="update.php" method="post">
                <table>
                    <tr>
                        <td>
                            <h3>Nom Usuari:</h3>
                            <input type="text" name="username" value="<?= htmlspecialchars($username); ?>">
                        </td>
                        <td>
                            <h3>Nom complet:</h3>
                            <input type="text" name="full_name" value="<?= htmlspecialchars($full_name); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>ID d'usuari:: "<?= $id ?>"</p>
                        </td>
                        <td>
                            <p>Bienvenido session, <?php echo htmlspecialchars($_SESSION["id"]); ?>!</p>
                        </td>
                    </tr>
                    <tr>
                        <td><!-- <li>
                    <h3>Número telefònic</h3>
                    <input type="tel" value="">
                </li> --></td>
                        <td><img src="images/avatar.png" alt="avatar"></td>
                    </tr>
                    <tr>
                        <td>
                            <h3 id="email">Email:</h3>
                            <input type="text" name="email" value="<?= htmlspecialchars($email); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><!-- 
            <h2 id="contrasenya">Contrasenya</h2>
            <input type="password" placeholder="Nova contrasenya">
            <input type="password" placeholder="Confirma la nova contrasenya"> --></td>
                        <td><img src="images/qr.png" alt="Qr"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Actualitzar">
                
            </form>
            <form action="logout.php" method="post">
                <input type="hidden" name="logout" value="true">
                <input type="submit" value="logout"></td>
            </form>
            </table>
        </div>

    </main>

    <footer>
        <a href="../eduQuack/Legal/License.pdf">Tots els drets reservats a eduQuack</a>
        <p>Contactens al correu <a href="mailto:duck4hats@gmail.com">duck4hats@gmail.com</a></p>
    </footer>
</body>

</html>