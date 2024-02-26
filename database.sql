CREATE DATABASE postpartum ; 

CREATE TABLE Admin ( 
    id_admin INT AUTO_INCREMENT NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_admin)
    );

CREATE TABLE Evenement (
    id_evenement INT AUTO_INCREMENT NOT NULL, 
    titre VARCHAR(50) NOT NULL,
    image longblob DEFAULT NULL, 
    description VARCHAR(500) NOT NULL,
    date_creation DATE DEFAULT NULL,
    id_admin INT NOT NULL,
    PRIMARY KEY (id_evenement),
    FOREIGN KEY (id_admin) REFERENCES Admin(id_admin)
    );

CREATE TABLE Blog (
    id_blog INT AUTO_INCREMENT NOT NULL,
    nom VARCHAR(50) ,
    PRIMARY KEY (id_blog)
);

CREATE TABLE Post (
    id_post INT AUTO_INCREMENT NOT NULL,
    categorie VARCHAR(50) NOT NULL,
    titre VARCHAR(50) NOT NULL,
    article LONGTEXT NOT NULL,
    image longblob DEFAULT NULL,
    jour_rédaction DATE DEFAULT NULL,
    id_blog INT NOT NULL, 
    id_admin INT NOT NULL,
    PRIMARY KEY (id_post),
    FOREIGN KEY (id_blog) REFERENCES Blog(id_blog),
    FOREIGN KEY (id_admin) REFERENCES Admin(id_admin)
);

CREATE TABLE User (
    id_user INT AUTO_INCREMENT NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR (50) NOT NULL, 
    email VARCHAR (50) NOT NULL,
    password VARCHAR (50) NOT NULL,
    id_admin INT NOT NULL, 
    PRIMARY KEY (id_user),
    FOREIGN KEY (id_admin) REFERENCES Admin(id_admin)
);

CREATE TABLE Commentaire (
    id_commentaire INT AUTO_INCREMENT NOT NULL,
    nom VARCHAR(50) NOT NULL, 
    réponse LONGTEXT NOT NULL, 
    jour_publication DATE DEFAULT NULL,
    PRIMARY KEY (id_commentaire), 
    id_admin INT NOT NULL, 
    id_post INT NOT NULL, 
    id_user INT NOT NULL,
    FOREIGN KEY (id_admin) REFERENCES Admin(id_admin),
    FOREIGN KEY (id_post) REFERENCES Post(id_post), 
    FOREIGN KEY (id_user) REFERENCES User(id_user)
);

