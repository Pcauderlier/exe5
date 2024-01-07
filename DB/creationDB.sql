DROP TABLE IF EXISTS livres;

CREATE TABLE livres (
    ID_Livre INT NOT NULL AUTO_INCREMENT,
    Titre VARCHAR(50) NOT NULL,
    Auteur VARCHAR(50) NOT NULL,
    Anne INT NOT NULL,

    PRIMARY KEY (ID_Livre)
);

-- Commandes SQL de bases : 

-- Permet d'afficher toutes les donnée de la table 'livres':
-- SELECT * FROM livres

--Afficher toute les donnée du livre dont le titre est 'test'
-- SELECT *¨FROM livres WHERE Titre = 'test' 

--Afficher toutes les infos sur les titres des collones de la table livres
--DESCRIBE livres

--Rajouter dans la table livres, les valeurs 'titre auteur et année' danns les collones correspondantes
--INSERT INTO livres (Titre, Auteur,Anne) VALUES ('titre','auteur','année)

--Modifie la colonne dont l'id est 'id' pour changer le titre, l'auteur et l'année
--UPDATE livres SET Titre = 'titre' ,Auteur = 'auteur' ,Anne = 'année' WHERE ID_Livre = 'id';

-- Suprime la ligne dont l'id est 'id
-- DELETE FROM livres WHERE ID_Livre = 'id'