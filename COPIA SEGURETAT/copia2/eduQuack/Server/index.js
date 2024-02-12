const express = require('express');
const http = require('http');
const socketIo = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

// Configurar el servidor de archivos estáticos desde el directorio public
app.use(express.static(__dirname + '/public'));

// Configurar la conexión de Socket.io
io.on('connection', (socket) => {
    console.log('Usuario conectado');

    // Manejar mensajes del cliente
    socket.on('mensaje', (mensaje) => {
        console.log('Mensaje recibido:', mensaje);
        // Reenviar el mensaje a todos los clientes conectados
        io.emit('mensaje', mensaje);
    });

    // Manejar la desconexión del cliente
    socket.on('disconnect', () => {
        console.log('Usuario desconectado');
    });
});

// Cambiar la dirección IP y el puerto aquí
const IP_ADDRESS = '192.168.56.144';
const PORT = 3000;

// Iniciar el servidor
server.listen(PORT, IP_ADDRESS, () => {
    console.log(`Servidor iniciado en http://${IP_ADDRESS}:${PORT}`);
});
