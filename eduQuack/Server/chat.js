const express = require('express');
const http = require('http');
const socketIo = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

// Configuración de la ruta principal
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});

// Objeto para almacenar los mensajes de cada sala
const chatRooms = {};

// Cuando un usuario se conecta al servidor de sockets
io.on('connection', (socket) => {
    // Cuando un usuario solicita unirse a una sala específica
    socket.on('joinRoom', (room) => {
        // El usuario se une a la sala
        socket.join(room);
        // Si la sala no existe, se crea en el objeto chatRooms
        if (!chatRooms[room]) {
            chatRooms[room] = [];
        }
        // Se envía el historial de chat de la sala al usuario que se acaba de unir
        io.to(room).emit('chatHistory', chatRooms[room]);
    });

    // Cuando un usuario envía un mensaje
    socket.on('sendMessage', ({ room, message }) => {
        // Se crea un nuevo mensaje con el mensaje del usuario y la marca de tiempo
        const newMessage = { message, timestamp: Date.now() };
        // El mensaje se añade al historial de chat de la sala
        chatRooms[room].push(newMessage);
        // El mensaje se envía a todos los usuarios en la sala
        io.to(room).emit('message', newMessage);
    });
});

// El servidor escucha en el puerto 3000
server.listen(3000, () => {
    console.log('Server is running on port 3000');
});
