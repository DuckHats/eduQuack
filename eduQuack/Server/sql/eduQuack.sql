-- DROP DATABASE IF EXISTS eduQuack;

CREATE DATABASE IF NOT EXISTS eduQuack;

USE eduQuack;

CREATE TABLE usuarios (
  id INTEGER NOT NULL AUTO_INCREMENT, 
  email VARCHAR(255) NOT NULL,
  full_name VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL, 
  username VARCHAR(80) NOT NULL, 
  curso VARCHAR(80) NOT NULL,
  edad INT NOT NULL, 
  PRIMARY KEY (id)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE cursos(
  id_curso INTEGER NOT NULL AUTO_INCREMENT, 
  nombre_curso VARCHAR(80) NOT NULL,
  PRIMARY KEY (id_curso)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE blog (
  id INTEGER NOT NULL AUTO_INCREMENT, 
  title VARCHAR(255) NOT NULL,
  content TEXT,
  image_path VARCHAR(255),
  created_at TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  author VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=innodb DEFAULT CHARSET=utf8;

-- CREATE TABLE codigos (
--   id INTEGER NOT NULL AUTO_INCREMENT, 
--   email VARCHAR(255) NOT NULL,
--   codigo VARCHAR(6),
--   creado_en TIMESTAMP NOT NULL DEFAULT current_timestamp(),
--   PRIMARY KEY (id)
-- ) ENGINE=innodb DEFAULT CHARSET=utf8;


CREATE TABLE noticia (
  id_noticia INTEGER NOT NULL AUTO_INCREMENT, 
  id_curso INTEGER NOT NULL,
  titulo VARCHAR(255),
  contenido TEXT,
  fecha DATE NOT NULL,
  PRIMARY KEY (id_noticia)
) ENGINE=innodb DEFAULT CHARSET=utf8;

-- Inserta datos
INSERT INTO usuarios (email, full_name, password, username, curso, edad) VALUES ('root@ginebro.cat', 'root', '1234', 'root', 'root', 0);
INSERT INTO cursos (nombre_curso) VALUES ('1ESO', '2ESO', '3ESO', '4ESO', 'CicloMedio', 'CicloSuperior', 'Bachillerato');