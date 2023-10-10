// login.js

function generarUserID() {
    var caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var user_id = '';
    for (var i = 0; i < 10; i++) {
        user_id += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return user_id;
}

function iniciarSesion() {
    // Obtenir les dades d'inici de sessió del formulari
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Comprovar les credencials (aquesta part haurà de ser gestionada pel teu servidor)
    if (username === 'usuari' && password === 'contrasenya') {
        // Si les credencials són correctes, genera un user_id i guarda'l
        var user_id = generarUserID();
        sessionStorage.setItem('user_id', user_id);

        // Redirigeix a la pàgina principal
        window.location.href = 'index.html';
    } else {
        // Si les credencials no són correctes, mostra un missatge d'error
        alert('Credenciales incorrectas. Por favor, inténtalo de nuevo.');
    }
}
