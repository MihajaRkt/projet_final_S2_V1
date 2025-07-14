create table membres(
    id_membre int primary key auto_increment,
    nom varchar(100),
    date_de_naissance date,
    genre char(1),
    email varchar(50),
    ville varchar(30),
    mdp varchar(20),
    image_profil varchar(100) 
);

create table categorie_objet(
    id_categorie int primary key auto_increment,
    nom_categorie varchar(100)
);

create table objet(
    id_objet int primary key auto_increment,
    nom_objet varchar(50),
    id_categorie int,
    id_membre int
);

create table images_objet(
    id_image int primary key auto_increment,
    id_objet int,
    nom_image varchar(100)
);

create table emprunt(
    id_emprunt int primary key auto_increment,
    id_objet int,
    id_membre int,
    date_emprunt date,
    date_retour date
);


insert into membres (nom, date_de_naissance, genre, email, ville, mdp, image_profil) values('Alice', '1999-01-01', 'F', 'alice@gmail.com', 'Antananarivo', 'alice', 'profil.png');
insert into membres (nom, date_de_naissance, genre, email, ville, mdp, image_profil) values('John', '1990-05-04', 'M', 'john@gmail.com', 'Tamatave', 'john', 'profil.png');
insert into membres (nom, date_de_naissance, genre, email, ville, mdp, image_profil) values('Bruce', '2001-10-11', 'M', 'bruce@gmail.com', 'Toliara', 'bruce', 'profil.png');
insert into membres (nom, date_de_naissance, genre, email, ville, mdp, image_profil) values('Marie', '1995-04-13', 'F', 'marie@gmail.com', 'Antananarivo', 'marie', 'profil.png');

insert into categorie_objet (nom_categorie) values 
('Esthetique'),
('Bricolage'),
('Mecanique'),
('Cuisine');

-- Objets de Alice (id_membre = 1)
insert into objet (nom_objet, id_categorie, id_membre) values
('Sèche-cheveux', 1, 1),
('Lisseur', 1, 1),
('Marteau', 2, 1),
('Tournevis', 2, 1),
('Perceuse', 2, 1),
('Clé à molette', 3, 1),
('Crics', 3, 1),
('Mixeur', 4, 1),
('Casserole', 4, 1),
('Four', 4, 1);

-- Objets de John (id_membre = 2)
insert into objet (nom_objet, id_categorie, id_membre) values
('Tondeuse', 1, 2),
('Rasoir', 1, 2),
('Scie', 2, 2),
('Pince', 2, 2),
('Pistolet à colle', 2, 2),
('Clé plate', 3, 2),
('Compresseur', 3, 2),
('Poêle', 4, 2),
('Grille-pain', 4, 2),
('Blender', 4, 2);

-- Objets de Bruce (id_membre = 3)
insert into objet (nom_objet, id_categorie, id_membre) values
('Brosse à cheveux', 1, 3),
('Peigne', 1, 3),
('Tournevis sans fil', 2, 3),
('Scie sauteuse', 2, 3),
('Perforateur', 2, 3),
('Pompe hydraulique', 3, 3),
('Jack hydraulique', 3, 3),
('Mixeur plongeant', 4, 3),
('Autocuiseur', 4, 3),
('Robot cuiseur', 4, 3);

-- Objets de Marie (id_membre = 4)
insert into objet (nom_objet, id_categorie, id_membre) values
('Fer à lisser', 1, 4),
('Brosse soufflante', 1, 4),
('Pistolet thermique', 2, 4),
('Ciseaux à métaux', 2, 4),
('Ponceuse', 2, 4),
('Manomètre', 3, 4),
('Cric hydraulique', 3, 4),
('Friteuse', 4, 4),
('Machine à pain', 4, 4),
('Batteur électrique', 4, 4);

-- date_emprunt = '2025-07-01', retour dans 7 jours
insert into emprunt (id_objet, id_membre, date_emprunt, date_retour) values
(3, 2, '2025-07-01', '2025-07-08'), -- John emprunte un outil d'Alice
(12, 3, '2025-07-02', '2025-07-09'), -- Bruce emprunte un outil de John
(23, 1, '2025-07-03', '2025-07-10'), -- Alice emprunte un outil de Bruce
(34, 1, '2025-07-04', '2025-07-11'), -- Alice emprunte un objet de Marie
(25, 2, '2025-07-05', '2025-07-12'), -- John emprunte un objet de Bruce
(6, 4, '2025-07-06', '2025-07-13'), -- Marie emprunte un outil d'Alice
(14, 4, '2025-07-07', '2025-07-14'), -- Marie emprunte un outil de John
(32, 3, '2025-07-08', '2025-07-15'), -- Bruce emprunte un outil de Marie
(20, 4, '2025-07-09', '2025-07-16'), -- Marie emprunte un objet de John
(10, 3, '2025-07-10', '2025-07-17'); -- Bruce emprunte un objet de Alice

INSERT INTO images_objet (id_objet, nom_image)
SELECT id_objet, 'profil.png' FROM objet;