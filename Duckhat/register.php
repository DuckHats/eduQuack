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

    // Prepara la consulta SQL para verificar si el nombre de usuario ya está en uso
    if($query = $db->prepare("SELECT * FROM users WHERE email = ?")) {
        $error = '';
    $query->bind_param('s', $email);
    $query->execute();
    //guardar
    $query->store_result();
        if ($query->num_rows > 0) {
                // A partir de aqui
        }
    }
    
?>
