CREATE DATABASE examen;
USE examen;

CREATE TABLE comptes (
    login VARCHAR(50) PRIMARY KEY,
    password VARCHAR(50) NOT NULL
);

ALTER TABLE comptes ADD COLUMN nom VARCHAR(50) NOT NULL;

CREATE TABLE etudiants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    controle FLOAT,
    projet FLOAT,
    examen FLOAT
);

INSERT INTO comptes VALUES ("ismail123", "1234", "Ismail ZAHIR");