<?php
ini_set('display_errors', 1);
$utilisateur = 'root';
$motdepasse = '';
$hote = 'localhost';
$base = 'mtg';
$dsn = 'mysql:dbname=' . $base . ';host=' . $hote;
try {
// On essaie de se connecter
// l'objet $basededonnees sera celui avec lequel que nous allons pouvoir travailler avec la base de données
$basededonnees = new PDO($dsn, $utilisateur, $motdepasse);
// On définit le mode d'erreur de PDO sur Exception
$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Définir l'encodage pour empêcher les problèmes d'affichage
$basededonnees->exec('SET CHARACTER SET UTF8');
// echo "Connexion réussie";
// On capture les exceptions et on affiche les informations relatives à celle-ci
} catch (PDOException $e) {
    echo ('Échec de la connexion : ' . $e->getMessage());
    exit;
}

?>