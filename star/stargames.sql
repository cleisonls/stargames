CREATE DATABASE IF NOT EXISTS star;

USE star;

CREATE TABLE IF NOT EXISTS usuarios(
	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(40) NOT NULL,
	email VARCHAR(40) NOT NULL,
	usuario VARCHAR(40) NOT NULL,
	senha VARCHAR(40) NOT NULL
);

INSERT INTO usuarios(nome,email,usuario,senha) VALUES
	("administrador geral","adm@mail.com","admin","admin");

CREATE TABLE IF NOT EXISTS logado(
	id_logado INT AUTO_INCREMENT PRIMARY KEY,
	estado BOOLEAN NOT NULL,
	id_usu INT NOT NULL,
	comentario VARCHAR(500),
	FOREIGN KEY (comentario) REFERENCES comentario(coment),
	FOREIGN KEY (id_usu) REFERENCES usuarios(id_usuario)
);

INSERT INTO logado(id_logado, estado, id_usu) VALUES (NULL, true, 1);
INSERT INTO logado(id_logado, estado, id_usu) VALUES (NULL, true, 2);

CREATE TABLE IF NOT EXISTS comentario(
	id_comentario INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(40) NOT NULL,
	coment VARCHAR(500) NOT NULL,
	data_msg DATE,
	FOREIGN KEY comentario(id_comentario) REFERENCES usuarios(id_usuario)
);

INSERT INTO comentario(coment) VALUES
	("alou");

CREATE TABLE IF NOT EXISTS materia(
    id_materia INT AUTO_INCREMENT PRIMARY KEY,
	descmat VARCHAR(500) NOT NULL,
	subtitulo VARCHAR(100) NOT NULL,
	FOREIGN KEY materia(id_materia) REFERENCES noticas(imagem)
);

INSERT INTO materia(descmat,subtitulo,imagem) VALUES
	("teste","retadado","img/imagem001.jpg");

CREATE TABLE IF NOT EXISTS noticias(
    id_noticia INT AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(100) NOT NULL,
    imagem VARCHAR(100) NOT NULL,
    titulo VARCHAR(100) NOT NULL
);

INSERT INTO noticias(descricao,imagem,titulo) VALUES
	("teste","img/imagem001.jpg","umtitulo aí");

CREATE TABLE IF NOT EXISTS jogos(
    id_jogos INT AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(100) NOT NULL,
    imagem VARCHAR(100) NOT NULL,
    titulo VARCHAR(100) NOT NULL,
	FOREIGN KEY jogos(id_jogos) REFERENCES usuarios(id_usuario)
);

INSERT INTO noticias(descricao,imagem,titulo) VALUES
	("teste2","img/imagem001.jpg","um titulo");