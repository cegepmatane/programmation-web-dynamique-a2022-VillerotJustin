<?php
require_once "../configuration.php";
require_once ACCES_PATH . "TribeDAO.php";
$Logo       = $_FILES["logo"];
$backGround = $_FILES['backgroung'];
$races      = $_POST['race'];
//echo "<pre>";
//print_r($races);
//echo "</pre>";

$TRIBE_FILTER = array(
    'id' => FILTER_SANITIZE_NUMBER_INT,
    'name' => FILTER_SANITIZE_SPECIAL_CHARS,
    'summary' => FILTER_SANITIZE_SPECIAL_CHARS,
    'description' => FILTER_FLAG_STRIP_HIGH,
    'color' => FILTER_SANITIZE_SPECIAL_CHARS,
    'mechanics' => FILTER_FLAG_STRIP_HIGH,
    'classes' => FILTER_FLAG_STRIP_HIGH,
    'personage' => FILTER_FLAG_STRIP_HIGH,
);

$tribe = filter_input_array(INPUT_POST, $TRIBE_FILTER);
$tribe['summary'] = addslashes($tribe['summary']);
$tribe['description'] = ($tribe['description']);
$tribe['mechanics'] = ($tribe['mechanics']);
$tribe['classes'] = ($tribe['classes']);
$tribe['personage'] = ($tribe['personage']);


$files = TribeDAO::checkFiles($tribe);

$error = null;

if ($Logo != null and $backGround!=null){
    if ($Logo['size'] != 0 and $Logo['size'] <= 500000  and substr($Logo['type'],0,5) == "image"){
        $Logo = addFile($Logo);
    } else if ($Logo['size'] == 0) {
        $Logo = $files['logo'];
    } else {
        $error += "Image To Big";
        echo "<pre>";
        print("Image To Big");
        echo "</pre>";
    }

    if ($backGround['size'] != 0 and $backGround['size'] <= 500000 and substr($backGround['type'],0,5) == "image"){
        $backGround = addFile($backGround);
    } else if ($backGround['size'] ==0) {
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

$result = TribeDAO::editTribe($tribe, $Logo, $backGround);

TribeDAO::editRace($tribe['id'], $races);


if (0!=$result and $error == null) {
    header('Location: admin-list.php?x=4');
    exit();
} else {
    echo($error);
}
?>
