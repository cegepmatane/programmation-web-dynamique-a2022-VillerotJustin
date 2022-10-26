<?php

include "../database.php";

$id         = $_POST['id'];
$name       = $_POST['name'];
$Sum        = $_POST['summary'];
$dsc        = $_POST['description'];
$Logo       = $_FILES["logo"];
$Color      = $_POST['color'];
$Races      = $_POST['races'];
$Mechanics  = $_POST['mechanics'];
$Classes    = $_POST['classes'];
$Personage  = $_POST['personage'];
$backGround = $_FILES['backgroung'];

$Sum = addslashes($Sum);
$dsc = addslashes($dsc);
$Races = addslashes($Races);
$Mechanics = addslashes($Mechanics);
$Classes = addslashes($Classes);
$Personage = addslashes($Personage);

$SQL_REQUEST = "SELECT logo, backgroung FROM mtgTribe WHERE id_tribe =" . $id . ";";
$detailedTribeRequest = $database->prepare($SQL_REQUEST);
$detailedTribeRequest->execute();
$files = $detailedTribeRequest->fetch();

$error = null;

if ($Logo != null and $backGround!=null){
    if ($Logo['size'] != 0 and $Logo['size'] <= 500000  and substr($Logo['type'],0,5) == "image"){
        $Logo = addFile($Logo);
    } else if ($Logo['size'] <= 250000) {
        $Logo = $files['logo'];
    } else {
        $error += "Image To Big";
        echo "<pre>";
        print("Image To Big");
        echo "</pre>";
    }

    if ($backGround['size'] != 0 and $backGround['size'] <= 500000 and substr($backGround['type'],0,5) == "image"){
        $backGround = addFile($backGround);
    } else if ($backGround['size'] <= 250000) {
        $backGround = $files['backgroung'];;
    } else {
        $error += "Image To Big";
        echo "<pre>";
        print("Image To Big");
        echo "</pre>";
    }
}

function addFile($file){
    $dossierCible = "../images/";
    $fichierCible = $dossierCible . basename($file["name"]);
    if (move_uploaded_file($file["tmp_name"], $fichierCible)) {
            //echo("Succès lors du chargement du fichier.\n");
    }
    else {
        echo("Erreur lors du chargement du fichier.\n");
    }
    return basename($file["name"]);
}

$SQL_REQUEST =
    "UPDATE mtgTribe 
    SET name       = \"%s\"
        , summary   = \"%s\"
        , dsc       = \"%s\"
        , logo      = \"%s\"
        , color     = \"%s\"
        , races     = \"%s\"
        , mechanics = \"%s\"
        , classes   = \"%s\"
        , personage = \"%s\"
        , backgroung= \"%s\"
        Where id_Tribe = '$id';";
$formattedSql = sprintf($SQL_REQUEST, $name, $Sum, $dsc, $Logo, $Color, $Races, $Mechanics, $Classes, $Personage, $backGround);
$connectionRequest = $database->prepare($formattedSql);
$result = $connectionRequest->execute();

if (0!=$result and $error == null) {
    header('Location: admin-tribe-list.php?x=4');
    exit();
} else {
    echo($error);
}
?>
