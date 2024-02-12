// session.js

// Funció per comprovar la sessió
function comprovarSessio() {
    if (!sessionStorage.getItem('user_id')) {
        // Si l'usuari no ha iniciat sessió, redirigeix-lo a la pàgina de login
        window.location.href = 'login.html'; // O la teva pàgina de login
    }
}

// Comprova la sessió quan es carrega una pàgina
window.onload = comprovarSessio;
