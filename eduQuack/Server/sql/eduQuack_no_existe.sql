CREATE DATABASE IF NOT EXISTS eduQuack;

USE eduQuack;

CREATE TABLE IF NOT EXISTS usuaris (
  id_usuari INTEGER NOT NULL AUTO_INCREMENT, 
  nom_usuari VARCHAR(255) NOT NULL, 
  contrasenya VARCHAR(255) NOT NULL, 
  nom VARCHAR(80) NOT NULL, 
  cognoms VARCHAR(80) NOT NULL, 
  PRIMARY KEY (id_usuari)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS cursos (
  id_curs INTEGER NOT NULL AUTO_INCREMENT, 
  nom_curs VARCHAR(80) NOT NULL,
  PRIMARY KEY (id_curs)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS blog (
  id_blog INTEGER NOT NULL AUTO_INCREMENT, 
  titol_blog VARCHAR(255) NOT NULL,
  content_blog TEXT,
  path_blog VARCHAR(255),
  date_blog TIMESTAMP NOT NULL DEFAULT current_timestamp,
  author_blog VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_blog)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS noticia (
  id_noticia INTEGER NOT NULL AUTO_INCREMENT, 
  titol_noticia VARCHAR(255) NOT NULL,
  content_noticia TEXT,
  path_noticia VARCHAR(255),
  date_noticia TIMESTAMP NOT NULL DEFAULT current_timestamp,
  author_noticia VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_noticia)
) ENGINE=innodb DEFAULT CHARSET=utf8;

INSERT INTO usuaris (nom_usuari, contrasenya, nom, cognoms) VALUES ('root', '1234', 'root', 'root');
