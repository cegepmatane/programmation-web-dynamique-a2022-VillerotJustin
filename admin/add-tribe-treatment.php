<?php

$name = $_POST['name'];
$Sum = $_POST['summary'];
$dsc = $_POST['description'];
$Logo = $_FILES["logo"];
$Color = $_POST['color'];
$Races = $_POST['races'];
$Mechanics = $_POST['mechanics'];
$Classes = $_POST['classes'];
$Personage = $_POST['personage'];
$backGround = $_FILES["backgroung"];

if ($Logo['size'] != 0){
    $Logo = addFile($Logo);
} else {
    $Logo = null;
}
if ($backGround['size'] != 0){
    $backGround = addFile($backGround);
} else {
    $backGround = null;
}

function addFile($file){
    $dossierCible = "../images/";
    $fichierCible = $dossierCible . basename($file["name"]);
    if (move_uploaded_file($file["tmp_name"], $fichierCible)) {
        //echo("Succès lors du chargement du fichier.\n");
    }
    else {
        echo "<pre>";
        print_r($file);
        echo "</pre>";
        print ($file["tmp_name"]."<br>");
        print ($fichierCible."<br>");
        print (basename($file["name"])."<br>");
        echo("Erreur lors du chargement du fichier.\n");
    }
    return basename($file["name"]);
}

include "../database.php";

$SQL_REQUEST =
    "INSERT INTO mtgTribe (id_Tribe, name, summary, dsc, logo, color, races, mechanics, classes, personage, backgroung) 
VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');";
$formattedSql = sprintf($SQL_REQUEST, $name, $Sum, $dsc, $Logo, $Color, $Races, $Mechanics, $Classes, $Personage, $backGround);
$connectionRequest = $database->prepare($formattedSql);
$result = $connectionRequest->execute();

if (0!=$result){
    header('Location: admin-tribe-list.php?x=2');
    exit();
}

?>
