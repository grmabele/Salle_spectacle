DROP DATABASE IF EXISTS spectacle;
CREATE DATABASE spectacle;
USE spectacle;

CREATE TABLE spectacles (
    id_spectacles INT AUTO_INCREMENT PRIMARY KEY,
    nom_evenement VARCHAR(255) NOT NULL,
    genre VARCHAR(255) NOT NULL,
    date_evenement DATE NOT NULL,
    heure_evenement TIME NOT NULL,
    description TEXT
);

CREATE TABLE messages (
    id_messages INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL
);

INSERT INTO Spectacles (nom_evenement, genre, date_evenement, heure_evenement, description)
VALUES
    ('Projection de ''L''Énigme de la Nuit''', 'Cinéma', '2023-11-15', '19:30:00', 'Un thriller mystérieux.'),
    ('Concert de ''Nebula Symphony''', 'Concert', '2023-12-02', '20:00:00', 'Un concert de musique orchestrale.'),
    ('Projection de ''L''Évasion du Temps''', 'Cinéma', '2023-11-25', '15:00:00', 'Un film de science-fiction palpitant.'),
    ('Spectacle de danse ''Harmonie Abstraite''', 'Danse', '2023-12-10', '18:45:00', 'Une performance de danse contemporaine.'),
    ('Concert de ''Sérénade Nocturne''', 'Concert', '2023-11-20', '19:00:00', 'Un concert de musique classique.'),
    ('Pièce de théâtre ''Le Destin Tragique''', 'Théâtre', '2023-12-05', '19:30:00', 'Une pièce dramatique captivante.'),
    ('Comédie romantique ''Rire en Amour''', 'Théâtre', '2023-11-28', '20:15:00', 'Une comédie romantique hilarante.'),
    ('Projection de ''La Quête de la Connaissance''', 'Cinéma', '2023-11-30', '17:30:00', 'Documentaire sur la science.'),
    ('Concert de ''Jazz en Fusion''', 'Concert', '2023-11-18', '20:30:00', 'Un concert de jazz moderne.'),
    ('Spectacle de magie ''Mystères Étonnants''', 'Spectacle', '2023-12-15', '16:00:00', 'Un spectacle de magie surprenant.');