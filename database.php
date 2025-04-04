<?php
// Connexion à la base de données
function getDbConnection() {
    static $db = null;
    
    if ($db === null) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=galerie_oselo;charset=utf8mb4', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }
    
    return $db;
}

