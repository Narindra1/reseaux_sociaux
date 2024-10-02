DROP DATABASE INFORMATION;

CREATE DATABASE INFORMATION;
USE INFORMATION;
CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) ,
    prenom VARCHAR(255) ,
    date_naissance VARCHAR(255),
    sexe VARCHAR(255),
    email VARCHAR(255) ,
    id_parcours INT ,
    password VARCHAR(255)

);

CREATE TABLE parcours(
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) 
);

INSERT INTO parcours (label) VALUES
("Mathématiques"),
("Anglais"),
("Français"),
("SVT");

INSERT INTO users (nom, prenom, date_naissance, sexe,id_parcours, email, password) VALUES 
("sahoby", "Narindra", "10-10-1987", "feminin", "1", "sahoby@gmail.com", "azerty");
