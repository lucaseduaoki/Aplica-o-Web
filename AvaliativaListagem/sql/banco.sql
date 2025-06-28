CREATE DATABASE Cinema;
USE Cinema;

CREATE TABLE Filmes(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR (50) NOT NULL,
    genero VARCHAR (50) NOT NULL,
    ano INT (4) NOT NULL,
    diretor VARCHAR (50)  NOT NULL,
    descricao TEXT, 
    duracao INT (3) NOT NULL,
    classificacao INT (3) NOT NULL,
    imagem VARCHAR (10000) NOT NULL
);
