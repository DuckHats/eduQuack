-- DROP DATABASE IF EXISTS eduQuack;

CREATE DATABASE IF NOT EXISTS eduQuack;

USE eduQuack;

CREATE TABLE IF NOT EXISTS usuarios (
  id INTEGER NOT NULL AUTO_INCREMENT, 
  email VARCHAR(255) NOT NULL,
  full_name VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL, 
  username VARCHAR(80) NOT NULL, 
  curso VARCHAR(80) NOT NULL,
  edad INT NOT NULL, 
  PRIMARY KEY (id)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS cursos(
  id_curso INTEGER NOT NULL AUTO_INCREMENT, 
  nombre_curso VARCHAR(80) NOT NULL,
  PRIMARY KEY (id_curso)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS blog (
  id INTEGER NOT NULL AUTO_INCREMENT, 
  title VARCHAR(255) NOT NULL,
  content TEXT,
  image_path VARCHAR(255),
  created_at TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  author VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=innodb DEFAULT CHARSET=utf8;

-- CREATE TABLE IF NOT EXISTS codigos (
--   id INTEGER NOT NULL AUTO_INCREMENT, 
--   email VARCHAR(255) NOT NULL,
--   codigo VARCHAR(6),
--   creado_en TIMESTAMP NOT NULL DEFAULT current_timestamp(),
--   PRIMARY KEY (id)
-- ) ENGINE=innodb DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS noticia (
  id_noticia INTEGER NOT NULL AUTO_INCREMENT, 
  id_curso INTEGER NOT NULL,
  titulo VARCHAR(255),
  contenido TEXT,
  fecha DATE NOT NULL,
  PRIMARY KEY (id_noticia)
) ENGINE=innodb DEFAULT CHARSET=utf8;

-- Crear la tabla "preguntas"
CREATE TABLE IF NOT EXISTS faq (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Campo de identificación único autoincremental
    titulo VARCHAR(255) NOT NULL, -- Título de la pregunta, no puede ser nulo
    contenido TEXT NOT NULL, -- Contenido de la pregunta, no puede ser nulo
    respuesta TEXT, -- Respuesta a la pregunta
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Fecha de creación con valor predeterminado
    fecha_modificacion TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Fecha de modificación con valor predeterminado en actualización
);


-- Crear la tabla "valoracio"
CREATE TABLE IF NOT EXISTS valoracio (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Campo de identificación único autoincremental
    titol VARCHAR(255) NOT NULL, -- Título de la pregunta, no puede ser nulo
    data_publicacio DATE NOT NULL, -- Fecha de creación con valor predeterminado
    completat BOOLEAN, -- Valoracion completada si o no
    enllac_formulari VARCHAR(255) NOT NULL
    );

-- Inserta datos
-- INSERT INTO usuarios (email, full_name, password, username, curso, edad) VALUES ('root@ginebro.cat', 'root', '1234', 'root', 'root', 0);
-- INSERT INTO cursos (nombre_curso) VALUES ('1ESO', '2ESO', '3ESO', '4ESO', 'CicloMedio', 'CicloSuperior', 'Bachillerato');
INSERT INTO valoracio (titol, data_publicacio, completat, enllac_formulari)
VALUES
('Maria Expósito', '2023-10-13', NULL, 'https://forms.gle/PZtutZYFvaGbdPSz6'),
('Enric Matamala', '2023-10-13', NULL, 'https://forms.gle/LsNHNSnfnRBEVMde6'),
('Berta Tomàs', '2023-10-13', NULL, 'https://forms.gle/DXp2yXpvxyJc7vmv9'),
('Mònica Llobera', '2023-10-13', NULL, 'https://forms.gle/C3hjq9jynPGYbh6u9'),
('Carles Blasco', '2023-10-13', NULL, 'https://forms.gle/nfzc7sWNSMFSFXJ76'),
('Pilar Castellano', '2023-10-13', NULL, 'https://forms.gle/afBJnSXRyoakLajF7'),
('Carles Lorente', '2023-10-13', NULL, 'https://forms.gle/64vamjYb6eCEiJUq9'),
('Gemma Pardell', '2023-10-13', NULL, 'https://forms.gle/vPqDLj1KuCDTyQFxz8'),
('Cristina Vallcorba', '2023-10-13', NULL, 'https://forms.gle/M8NiiZRXQa3zsyoL9'),
('Diego de la Torre', '2023-10-13', NULL, 'https://forms.gle/VqPP3XD8kTphSMpu5'),
('Gemma Querol', '2023-10-13', NULL, 'https://forms.gle/NrjMsPG6pBZpt9CN9'),
('Cristina Royo', '2023-10-13', NULL, 'https://forms.gle/jp9E9Cc7oFXenj6y6'),
('Judit Molins', '2023-10-13', NULL, 'https://forms.gle/VpXz8BVKtpAyvnV28'),
('Txu Morillas', '2023-10-13', NULL, 'https://forms.gle/7YF6GcgkKnmXgyuW7'),
('Jose Cendón', '2023-10-13', NULL, 'https://forms.gle/73GWQUKXnJmhWBCLA'),
('Dolors Morcillo', '2023-10-13', NULL, 'https://forms.gle/YaNAZD8AybbNVhbPA'),
('Manel Lladó', '2023-10-13', NULL, 'https://forms.gle/RpoEtuk8WxZeWdHUA'),
('Alicia Molina', '2023-10-13', NULL, 'https://forms.gle/kUgeJkpW2MTifiAPA'),
('Patxi Perales', '2023-10-13', NULL, 'https://forms.gle/hFfotmLZsbCntPTK8'),
('Salvador Quadrades', '2023-10-13', NULL, 'https://forms.gle/Uihs26yUAzipKLFH7'),
('Pilar Ors', '2023-10-13', NULL, 'https://forms.gle/VQgiQxTbEP8Vc1Do7'),
('Isabel Ligero', '2023-10-13', NULL, 'https://forms.gle/7gtBFcYSzQucHGdw7'),
('Albert Macià', '2023-10-13', NULL, 'https://forms.gle/LCg4y2nZZJu2bcpb7'),
('Èrica Dotor', '2023-10-13', NULL, 'https://forms.gle/wQTFWYCALPHP28Tr8'),
('Pau Farell', '2023-10-13', NULL, 'https://forms.gle/i9duDqCSpY54o3YEA'),
('Núria Sellés', '2023-10-13', NULL, 'https://forms.gle/mmm9Q5FoWumGGUan8'),
('Eduard Gutiérrez', '2023-10-13', NULL, 'https://forms.gle/neVLcHTBqJWn2LTdA'),
('Xavi Sala', '2023-10-13', NULL, 'https://forms.gle/H1ouaJTSEFTcV8478'),
('Marc Lurbe', '2023-10-13', NULL, 'https://forms.gle/aqXCaPH6oaLthUVu8'),
('Eugeni Soy', '2023-10-13', NULL, 'https://forms.gle/VMqoNoEz3tVd5YEH6'),
('Àlex Funes', '2023-10-13', NULL, 'https://forms.gle/kTqNfj6raHHbPHU48'),
('Ivan Nieto', '2023-10-13', NULL, 'https://forms.gle/8neo8GmiWrzRpdM3A'),
('Vladimir Bellavista', '2023-10-13', NULL, 'https://forms.gle/EptVu1rq9jQEmxYcA'),
('Joan Pardo', '2023-10-13', NULL, 'https://forms.gle/ashwqwUksXoXb7sS9'),
('Virgínia Carmona', '2023-10-13', NULL, 'https://forms.gle/7Z1erUBcxdVSAdEq5'),
('Carles Margenat', '2023-10-13', NULL, 'https://forms.gle/68biEKA21fuPcErX6'),
('Maria Ramírez', '2023-10-13', NULL, 'https://forms.gle/URbMpY3Ej944NYuFA'),
('Angela Palacios', '2023-10-13', NULL, 'https://forms.gle/A81iAyn9jneYFK5V7'),
('Imanol Valle', '2023-10-13', NULL, 'https://forms.gle/RZSV6uyzinTwz8sn9'),
('Sofia Torrado', '2023-10-13', NULL, 'https://forms.gle/Fx8or9LzwaeB4oZr5');
