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
    $sql = "SELECT username, email, full_name FROM usuarios WHERE id = '$id'";
    $result = $mysqli->query($sql);

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
            <li><a href="index.html"><h3>Menú</h3></a></li>
            <li><a href="teams.html"><h3>Grups</h3></a></li>
            <li><a href="news.html"><h3>Notícies</h3></a></li>
            <li><a href="perfil.php"><img id="conficon" src="images/userselec.png"></a></li>
        </ul> 
    </menu>

    <main>
        <div id="sidebarconf">
            <ul>
                <li><a href="#perfil">Perfil</a></li>
                <li><a href="#email">E-mail</a></li>
                <li><a href="#contrasenya">Contrasenya</a></li>
            </ul>
        </div>
        
        <div id="infoconf">
            <h2 id="perfil">Perfil</h2>
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION["id"]); ?>!</h1>
            <form action="update.php" method="post">
            <ul>
                <li>
                    <h3>Username</h3>
                    <input type="text" name="username" value="<?= htmlspecialchars($username); ?>">
                    <p>ID de usuario: "<?= $id ?>"</p>
                </li>
                <li>
                    <h3>Nom complet</h3>
                    <input type="text" name="full_name" value="<?= htmlspecialchars($full_name); ?>">
                </li>
                <!-- <li>
                    <h3>Número telefònic</h3>
                    <input type="tel" value="">
                </li> -->
            </ul>
            <img src="images/avatar.png" alt="avatar">

            <h2 id="email">E-mail</h2>
            <input type="text" name="full_name" value="<?= htmlspecialchars($email); ?>">
<!-- 
            <h2 id="contrasenya">Contrasenya</h2>
            <input type="password" placeholder="Nova contrasenya">
            <input type="password" placeholder="Confirma la nova contrasenya"> -->

            <input type="submit" onclick="window.location.href = 'perfil.php';" value="Actualitzar">
            <input id="logout" type="submit" onclick="window.location.href = 'logout.php';" value="Logout">
            <img src="images/qr.png" alt="Qr">
            </form>
        </div>
        
    </main>
    
    <footer>
        <a href="../eduQuack/Legal/License.pdf">Tots els drets reservats a eduQuack</a>
        <p>Contactens al correu <a href="mailto:example@ginebro.cat">example@ginebro.cat</a></p>
    </footer>
</body>
</html>
