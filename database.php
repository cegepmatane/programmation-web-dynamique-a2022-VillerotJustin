<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$adresseCourante = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$estSurServeurTiweb = strpos($adresseCourante, 'tiweb.cgmatane.qc.ca') !== false ? true : false;

if ($estSurServeurTiweb) {
 $utilisateur     = 'tiweb_';
 $motdepasse = '';
 $hote       = 'localhost';
 $base       = 'tiweb_';
} else {
 $utilisateur     = 'root';
 $motdepasse = '';
 $hote       = 'localhost';
 $base       = 'mtg';
}

$dsn = 'mysql:dbname=' . $base . ';host=' . $hote;
try {
 // On essaie de se connecter
 // l'objet $basededonnees sera avec lequel que nous allons pouvoir travailler avec la base de données
 $database = new PDO($dsn, $utilisateur, $motdepasse);

 // On définit le mode d'erreur de PDO sur Exception
 $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 // Définir l'encodage pour empêcher les problèmes d'affichage
 $database->exec('SET CHARACTER SET UTF8');
 //echo "Connexion réussie";

 // On capture les exceptions et on affiche les informations relatives à celle-ci catch (PDOException $e)
} catch (PDOException $e) {
 echo ('Échec de la connexion : ' . $e->getMessage());
 exit;
}