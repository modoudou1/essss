CREATE DATABASE pharmacie;
USE pharmacie;

CREATE TABLE demandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medicament VARCHAR(255) NOT NULL,
    client VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    reponse VARCHAR(10) NULL
);
