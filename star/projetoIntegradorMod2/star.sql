CREATE DATABASE IF NOT EXISTS star;

USE star;

CREATE TABLE IF NOT EXISTS usuarios(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(50) NOT NULL,
	usuario VARCHAR(40) NOT NULL,
	email VARCHAR(40) NOT NULL,
	senha VARCHAR(32) NOT NULL
);

INSERT INTO `usuarios`(`nome`, `usuario`, `email`, `senha`) VALUES 
('Administrador Geral', 'admin', 'admin@mail.com', md5('admin'));

CREATE TABLE IF NOT EXISTS logado(
	id_logado INT AUTO_INCREMENT PRIMARY KEY,
	estado BOOLEAN NOT NULL,
	id_usu INT NOT NULL,
	FOREIGN KEY (id_usu) REFERENCES usuarios(id)
);

INSERT INTO `logado`(`id_logado`, `estado`, `id_usu`) VALUES (NULL, true, '1');
INSERT INTO `logado`(`id_logado`, `estado`, `id_usu`) VALUES (NULL, true, '2');