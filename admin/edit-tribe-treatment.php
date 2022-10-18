<?php

$id = $_POST['id'];
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
    "UPDATE mtgTribe 
    SET name       = '%s'
        , summary   = '%s'
        , dsc       = '%s'
        , logo      = '%s'
        , color     = '%s'
        , races     = '%s'
        , mechanics = '%s'
        , classes   = '%s'
        , personage = '%s'
        , backgroung= '%s'
        Where id_Tribe = '$id';";
$formattedSql = sprintf($SQL_REQUEST, $name, $Sum, $dsc, $Logo, $Color, $Races, $Mechanics, $Classes, $Personage, $backGround);
$connectionRequest = $database->prepare($formattedSql);
$result = $connectionRequest->execute();

if (0!=$result) {
    header('Location: admin-tribe-list.php?x=4');
    exit();
}

?>
