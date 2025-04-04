-- Base de données pour Galerie Oselo
-- Création de la base de données
CREATE DATABASE IF NOT EXISTS galerie_oselo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE galerie_oselo;

-- Table des entrepôts
CREATE TABLE IF NOT EXISTS warehouses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table des œuvres
CREATE TABLE IF NOT EXISTS artworks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    year INT NOT NULL,
    artist VARCHAR(255) NOT NULL,
    width INT NOT NULL COMMENT 'Largeur en cm',
    height INT NOT NULL COMMENT 'Hauteur en cm',
    warehouse_id INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (warehouse_id) REFERENCES warehouses(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Données de test pour les entrepôts
INSERT INTO warehouses (name, address) VALUES
('Entrepôt Principal', '15 Rue de la Paix, 75002 Paris, France'),
('Dépôt Rive Gauche', '45 Boulevard Saint-Germain, 75005 Paris, France'),
('Stockage Sécurisé', '8 Avenue Montaigne, 75008 Paris, France');

-- Données de test pour les œuvres
INSERT INTO artworks (title, year, artist, width, height, warehouse_id) VALUES
('La Joconde (Reproduction)', 2018, 'Atelier Louvre', 77, 53, 1),
('Nuit étoilée', 2019, 'Vincent Dupont', 120, 90, 1),
('Abstraction n°5', 2020, 'Sophie Martin', 100, 100, 2),
('Paysage d\'automne', 2017, 'Jean Dubois', 80, 60, 2),
('Portrait de femme', 2021, 'Marie Lambert', 50, 70, 3),
('Nature morte aux fruits', 2016, 'Pierre Moreau', 60, 40, 3),
('Composition géométrique', 2022, 'Lucie Bernard', 90, 90, NULL),
('Coucher de soleil', 2020, 'Thomas Petit', 100, 70, NULL);

