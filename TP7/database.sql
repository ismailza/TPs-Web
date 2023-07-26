
CREATE DATABASE Ecole;

USE Ecole;

CREATE TABLE etudiant (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(40) NOT NULL,
    filiere VARCHAR(40) NOT NULL,
    controle FLOAT,
    exam FLOAT
);

CREATE TABLE admin(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(40) NOT NULL,
    email VARCHAR(60) UNIQUE NOT NULL,
    login VARCHAR(30) UNIQUE NOT NULL,
    password VARCHAR(40) NOT NULL
);

INSERT INTO admin (nom, email, login, password) VALUES ("Ismail ZAHIR","ismail@zahir.ma","ismail123",md5("1234"));