<?php

$name = $_POST['name'];
$Sum = $_POST['summary'];
$dsc = $_POST['description'];
$Logo = $_POST['logo'];
$Color = $_POST['color'];
$Races = $_POST['races'];
$Mechanics = $_POST['mechanics'];
$Classes = $_POST['classes'];
$Personage = $_POST['personage'];
$backGround = $_POST['backgroung'];

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
