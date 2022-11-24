<?php

require_once "../configuration.php";
require_once ACCES_PATH . "TribeDAO.php";

$avatar = $_FILES["logo"];
$backGround = $_FILES["backgroung"];
$races      = $_POST['race'];
//echo "<pre>";
//print_r($races);
//echo "</pre>";


$TRIBE_FILTER = array(
    'name' => FILTER_SANITIZE_SPECIAL_CHARS,
    'summary' => FILTER_SANITIZE_SPECIAL_CHARS,
    'description' => FILTER_SANITIZE_SPECIAL_CHARS,
    'color' => FILTER_SANITIZE_SPECIAL_CHARS,
    'mechanics' => FILTER_SANITIZE_SPECIAL_CHARS,
    'classes' => FILTER_SANITIZE_SPECIAL_CHARS,
    'personage' => FILTER_SANITIZE_SPECIAL_CHARS,
);

$tribe = filter_input_array(INPUT_POST, $TRIBE_FILTER);
$tribe['summary'] = addslashes($tribe['summary']);
$tribe['description'] = addslashes($tribe['description']);
$tribe['mechanics'] = addslashes($tribe['mechanics']);
$tribe['classes'] = addslashes($tribe['classes']);
$tribe['personage'] = addslashes($tribe['personage']);

$error = null;

if ($avatar != null and $backGround!=null){
    if ($avatar['size'] != 0 and $avatar['size'] <= 250000){
        $avatar = addFile($avatar);
    } else if ($avatar['size'] <= 250000) {
        $avatar = null;
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


$result = TribeDAO::addTribe($tribe, $avatar, $backGround);

//echo "<pre>";
//print_r($result);
//echo "</pre>";
//print($result['id']['id_Tribe']);

TribeDAO::insertRace($result['id']['id_Tribe'], $races);

if (0!=$result['result'] and $error == null){
    header('Location: admin-list.php?x=2');
    exit();
}else {
    echo($error);
}

?>
