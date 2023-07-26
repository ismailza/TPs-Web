CREATE DATABASE Votes;
USE Votes;

CREATE TABLE Comptes (
    login VARCHAR(50) PRIMARY KEY,
    password VARCHAR(50) NOT NULL
);

CREATE TABLE Candidats (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(30) NOT NULL,
    score INT
);

INSERT INTO Comptes VALUES ("ismail", MD5("1234"));

INSERT INTO Candidats (Nom, score) VALUES ("Alami", 0), ("Mouhani", 0),("Rguibi", 0), ("Autre", 0);
