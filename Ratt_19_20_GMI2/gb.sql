CREATE DATABASE gestion_bank;
USE gestion_bank;

CREATE TABLE Admin (
    login VARCHAR(45) PRIMARY KEY,
    password VARCHAR(40) NOT NULL
);

CREATE TABLE Compte (
    NCompte INT PRIMARY KEY,
    Solde DECIMAL NOT NULL,
    Client VARCHAR(26)
);

INSERT INTO admin VALUES ("ismail123", MD5("1234"));

INSERT INTO compte VALUES (1, 6410, "Tidli"),(2, 12000, "Houssine"),(3, 7000, "Hassan"),(4, 4700, "Hind");