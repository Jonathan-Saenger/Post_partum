CREATE DATABASE postpartum ; 

CREATE TABLE Admin ( 
    id_admin INT AUTO_INCREMENT NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    );

ALTER TABLE Admin 
    add PRIMARY KEY (Id_admin);

CREATE TABLE Evenement (
    Id_evenement INT AUTO_INCREMENT NOT NULL, 
    titre VARCHAR(50) NOT NULL,
    image longblob DEFAULT NULL, 
    description VARCHAR(500) NOT NULL,
    date_creation DATE DEFAULT NULL,
    );

ALTER TABLE Evenement 
    add PRIMARY KEY (Id_evenement), Id_admin INT NOT NULL, FOREIGN KEY(Id_admin) REFERENCES admin(Id_admin);

CREATE TABLE Blog (
    Id_blog INT AUTO_INCREMENT NOT NULL,
    nom VACHAR(50) 
);

ALTER TABLE Blog
    add PRIMARY KEY (Id_blog);

CREATE TABLE Post (
    Id_post INT AUTO_INCREMENT NOT NULL,
    catégorie VARCHAR(50) NOT NULL,
    titre VARCHAR(50) NOT NULL,
    article LONGTEXT NOT NULL,
    image longblob DEFAULT NULL,
    jour_rédaction DATE DEFAULT NULL,
);

ALTER TABLE Post 
    ADD PRIMARY KEY (Id_post), Id_blog INT NOT NULL, FOREIGN KEY(Id_blog) REFERENCES Blog(Id_blog), 
    Id_admin INT NOT NULL, FOREIGN KEY(Id_Admin) REFERENCES Admin(Id_admin); 

CREATE TABLE "User" (
    Id_user INT AUTO_INCREMENT NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prénom VARCHAR (50) NOT NULL, 
    email VARCHAR (50) NOT NULL,
    password VARCHAR (50) NOT NULL,
);

ALTER TABLE "User" 
    add PRIMARY KEY (id_user), Id_admin INT NOT NULL, FOREIGN KEY(Id_admin) REFERENCES admin(Id_admin); 

CREATE TABLE Commentaire (
    Id_commentaire INT AUTO_INCREMENT NOT NULL,
    nom VARCHAR(50) NOT NULL, 
    réponse LONGTEXT NOT NULL, 
    jour_publication DATE DEFAULT NULL,
);

ALTER TABLE Commentaire 
    ADD PRIMARY KEY (id_commentaire), 
    Id_admin INT NOT NULL, FOREIGN KEY(Id_admin) REFERENCES Admin(Id_admin),
    Id_post INT NOT NULL, FOREIGN KEY(Id_post) REFERENCES Post(Id_post),
    Id_user INT NOT NULL, FOREIGN KEY(Id_user) REFERENCES User(Id_user);

