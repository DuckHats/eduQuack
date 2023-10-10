<?php
// Include config file
require_once "config.php";
require_once "session.php";


// Verifica si el formulario ha sido enviado con el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Obtiene los datos del formulario
    $fullname = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    // $username = $_POST['username'];
    // $cursoId = $_POST['curso_id'];
    // $fechaNacimiento = $_POST['fecha_nacimiento'];
    
                    // A partir de aqui
                    
    // Prepara la consulta SQL para verificar si el nombre de usuario ya está en uso
    $sql = "SELECT id FROM users WHERE username = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Vincula las variables a la declaración preparada como parámetros
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        
        // Establece los parámetros
        $param_username = $username;
        
        // Intenta ejecutar la declaración preparada
        if(mysqli_stmt_execute($stmt)){
            // Almacena el resultado
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                // Nombre de usuario ya en uso, muestra un mensaje de error
                header("Location: register.html?error=usuarioexistente");
                exit();
            } else{
                // Nombre de usuario no está en uso, procede a registrar el usuario
                // Prepara la declaración SQL para insertar datos en la tabla users
                $sql = "INSERT INTO users (username, curso_id, email, fecha_nacimiento, password) VALUES (?, ?, ?, ?, ?)";
                 
                if($stmt = mysqli_prepare($link, $sql)){
                    // Vincula las variables a la declaración preparada como parámetros
                    mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_cursoId, $param_email, $param_fechaNacimiento, $param_password);
                    
                    // Establece los parámetros
                    $param_username = $username;
                    $param_cursoId = $cursoId;
                    $param_email = $email;
                    $param_fechaNacimiento = $fechaNacimiento;
                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Crea un hash de contraseña
                    
                    // Intenta ejecutar la declaración preparada
                    if(mysqli_stmt_execute($stmt)){
                        // Registro exitoso, redirige al usuario a la página de inicio de sesión
                        header("Location: login.html");
                        exit();
                    } else{
                        // Error al registrar el usuario, muestra un mensaje de error
                        header("Location: register.html?error=registrofallido");
                        exit();
                    }

                    // Cierra la declaración
                    mysqli_stmt_close($stmt);
                }
            }
        } else{
            // Error en la declaración preparada, muestra un mensaje de error
            header("Location: register.html?error=errordeconsulta");
            exit();
        }

        // Cierra la declaración
        // mysqli_stmt_close($stmt);
    }
    
    // Cierra la conexión
    mysqli_close($link);
}
?>
