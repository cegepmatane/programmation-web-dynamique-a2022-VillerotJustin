<?php

$Logo = $_FILES["logo"];
$backGround = $_FILES["backgroung"];

$TRIBE_FILTER = array(
    'name' => FILTER_SANITIZE_SPECIAL_CHARS,
    'summary' => FILTER_SANITIZE_SPECIAL_CHARS,
    'description' => FILTER_SANITIZE_SPECIAL_CHARS,
    'color' => FILTER_SANITIZE_SPECIAL_CHARS,
    'races' => FILTER_SANITIZE_SPECIAL_CHARS,
    'mechanics' => FILTER_SANITIZE_SPECIAL_CHARS,
    'classes' => FILTER_SANITIZE_SPECIAL_CHARS,
    'personage' => FILTER_SANITIZE_SPECIAL_CHARS,
);

$tribe = filter_input_array(INPUT_POST, $TRIBE_FILTER);
$tribe['summary'] = addslashes($tribe['summary']);
$tribe['description'] = addslashes($tribe['description']);
$tribe['races'] = addslashes($tribe['races']);
$tribe['mechanics'] = addslashes($tribe['mechanics']);
$tribe['classes'] = addslashes($tribe['classes']);
$tribe['personage'] = addslashes($tribe['personage']);

$error = null;

if ($Logo != null and $backGround!=null){
    if ($Logo['size'] != 0 and $Logo['size'] <= 250000){
        $Logo = addFile($Logo);
    } else if ($Logo['size'] <= 250000) {
        $Logo = null;
    } else {
        $error += "Image To Big";
        echo "<pre>";
        print("Image To Big");
        echo "</pre>";
    }

    if ($backGround['size'] != 0 and $backGround['size'] <= 250000){
        $backGround = addFile($backGround);
    } else if ($backGround['size'] <= 250000) {
        $backGround = null;
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
VALUES (NULL, :name, :summary, :description, \"%s\", :color, :races, :mechanics, :classes, :personage, \"%s\");";
$formattedSql = sprintf($SQL_REQUEST, $Logo, $backGround);
$connectionRequest = $database->prepare($formattedSql);
$connectionRequest->bindParam(':name', $tribe['name'], PDO::PARAM_STR);
$connectionRequest->bindParam(':summary', $tribe['summary'], PDO::PARAM_STR);
$connectionRequest->bindParam(':description', $tribe['description'], PDO::PARAM_STR);
$connectionRequest->bindParam(':color', $tribe['color'], PDO::PARAM_STR);
$connectionRequest->bindParam(':races', $tribe['races'], PDO::PARAM_STR);
$connectionRequest->bindParam(':mechanics', $tribe['mechanics'], PDO::PARAM_STR);
$connectionRequest->bindParam(':classes', $tribe['classes'], PDO::PARAM_STR);
$connectionRequest->bindParam(':personage', $tribe['personage'], PDO::PARAM_STR);
$result = $connectionRequest->execute();

if (0!=$result and $error == null){
    header('Location: admin-tribe-list.php?x=2');
    exit();
}else {
    echo($error);
}

?>
