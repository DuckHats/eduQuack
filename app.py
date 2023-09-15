from flask import Flask, render_template, request, redirect, url_for, flash
from werkzeug.utils import secure_filename
import os
import sqlite3

app = Flask(__name__)
app.secret_key = 'your_secret_key'  # Cambia esto a una clave segura

UPLOAD_FOLDER = 'uploads'
ALLOWED_EXTENSIONS = {'png', 'jpg', 'jpeg', 'gif'}

app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER
app.config['MAX_CONTENT_LENGTH'] = 16 * 1024 * 1024  # Tamaño máximo del archivo (16MB)

DATABASE = 'database.db'

# Función para verificar las extensiones permitidas
def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

# Ruta de inicio
@app.route('/')
def index():
    return render_template('index.html')

# Ruta de registro de usuario
@app.route('/registro', methods=['POST'])
def registro():
    if request.method == 'POST':
        nombre = request.form['nombre']
        imagen = request.files['imagen']

        if nombre and imagen and allowed_file(imagen.filename):
            filename = secure_filename(imagen.filename)
            imagen.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
            
            # Guardar en la base de datos (SQLite en este ejemplo)
            conn = sqlite3.connect(DATABASE)
            cur = conn.cursor()
            cur.execute('INSERT INTO perfiles (nombre, imagen) VALUES (?, ?)', (nombre, filename))
            conn.commit()
            conn.close()

            flash('Registro exitoso. ¡Inicia sesión!')
        else:
            flash('Error en el registro. Asegúrate de proporcionar un nombre y una imagen válida (PNG, JPG, JPEG, GIF).')

        return redirect(url_for('index'))

if __name__ == '__main__':
    app.run(debug=True)
