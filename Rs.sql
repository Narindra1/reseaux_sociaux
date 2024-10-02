DROP DATABASE Reseau_Sociaux;

CREATE DATABASE Reseau_Sociaux;
USE Reseau_Sociaux;
CREATE TABLE user(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255) ,
    password VARCHAR(255),
    isAdmin TINYINT(1) DEFAULT 0
);

CREATE TABLE publication(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    contenu TEXT,
    date_publication TIMESTAMP
);



CREATE TABLE commentaire(
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255),
    id_user INT,
    id_publication INT
);



CREATE TABLE reaction_publication(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_publication INT,
    id_user INT,
    type VARCHAR(255)
  
);




CREATE TABLE reaction_commentaire(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_commentaire INT,
    id_user INT,
    type VARCHAR(255)
  
);


INSERT INTO user (nom, prenom, email, password, isAdmin) VALUES 
("sahoby", "Narindra","sahoby@gmail.com", "azerty",1),
("Randria", "Miora", "miora@gmail.com", "qwerty", 0),
("Rajaonarison", "Andry", "andry@gmail.com", "123456", 0),
("Rakoto", "Faly", "faly@gmail.com", "password123", 1);


INSERT INTO publication (id_user, contenu, date_publication) VALUES 
(1, 'Je viens de finir un super projet en développement web!', NOW()),
(2, 'Quelqu\'un a des recommandations pour un bon livre de programmation?', NOW()),
(3, 'Je suis allé à la conférence tech aujourd\'hui, c\'était incroyable!', NOW()),
(1, 'Mon nouveau framework préféré est vraiment puissant!', NOW()),
(2, 'Est-ce que quelqu\'un a essayé d\'apprendre l\'intelligence artificielle récemment?', NOW()),
(3, 'Regardez ce coucher de soleil que j\'ai capturé pendant ma randonnée!', NOW()),
(1, 'Je suis curieux de savoir quel langage de programmation vous préférez!', NOW()),
(2, 'Aujourd\'hui, j\'ai réussi à débugger un code qui m\'a pris des heures!', NOW()),
(3, 'Les nouvelles fonctionnalités de ce logiciel sont vraiment impressionnantes!', NOW()),
(1, 'Quel est le prochain projet sur lequel vous travaillez?', NOW());

INSERT INTO commentaire (label, id_user, id_publication) VALUES 
('Félicitations! C\'est toujours gratifiant de terminer un projet.', 2, 1),
('Je recommande "Clean Code" de Robert C. Martin!', 1, 2),
('Ça devait être super! Quelles étaient les principales discussions?', 2, 3),
('Quel framework utilises-tu?', 3, 4),
('J\'ai commencé récemment, et c\'est fascinant!', 1, 5),
('Magnifique photo! Où était-ce?', 2, 6),
('Je préfère Python pour sa simplicité.', 2, 7),
('Ça fait du bien quand on trouve enfin la solution!', 3, 8),
('Je suis d\'accord, c\'est impressionnant!', 1, 9),
('Je travaille sur un projet d\'application mobile.', 3, 10);


INSERT INTO reaction_publication (id_publication, id_user, type)
VALUES 
(1, 2, 'like'),
(2, 1, 'love'),
(3, 3, 'haha');

INSERT INTO reaction_commentaire (id_commentaire, id_user, type)
VALUES (1, 1, 'like');


