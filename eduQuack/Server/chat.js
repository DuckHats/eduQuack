const express = require('express');
const http = require('http');
const socketIo = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

const chatRooms = {};

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});

io.on('connection', (socket) => {
    socket.on('joinRoom', (room) => {
        socket.join(room);
        if (!chatRooms[room]) {
            chatRooms[room] = [];
        }
        // Enviar només els missatges nous a l'usuari que s'acaba de connectar
        socket.emit('chatHistory', chatRooms[room]);
    });

    socket.on('sendMessage', ({ room, message, username }) => {
        const newMessage = { message, timestamp: Date.now(), username };
        chatRooms[room].push(newMessage);
        io.to(room).emit('message', newMessage);
    });
});

server.listen(3000, () => {
    console.log('El servidor està funcionant al port 3000');
});
