DROP TABLE IF EXISTS livres;

CREATE TABLE livres (
    ID_Livre INT NOT NULL AUTO_INCREMENT,
    Titre VARCHAR(50) NOT NULL,
    Auteur VARCHAR(50) NOT NULL,
    Anne INT NOT NULL,

    PRIMARY KEY (ID_Livre)
);