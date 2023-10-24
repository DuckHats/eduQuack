<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canviar Contrasenya | eduQuack</title>
    <link rel="icon" href="images/ginebro-logo (1).png">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main class="loginmain">
        <div class="ginebro">
            <img id="logologin" src="../eduQuack/images/ginebro-logo-blanc-742059845.png">
        </div>

        <div class="info">
            <h1>Canviar Contrasenya</h1>
            <br>
            <form action="reset-password-process.php" method="post">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                <div class="form-group">
                    <label>Nova Contrasenya</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Confirmar Nova Contrasenya</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Canviar Contrasenya">
                </div>
            </form>
        </div>
    </main>
</body>
</html>
