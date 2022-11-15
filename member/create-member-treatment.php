<?php
require "../configuration.php";
require ACCES_PATH . "MemberDAO.php";
$avatar = $_FILES["avatar"];

$MEMBER_FILTER = array(
    'username' => FILTER_SANITIZE_SPECIAL_CHARS,
    'password' => FILTER_SANITIZE_SPECIAL_CHARS,
    'mail' => FILTER_SANITIZE_SPECIAL_CHARS,
    'name' => FILTER_SANITIZE_SPECIAL_CHARS,
    'lastName' => FILTER_SANITIZE_SPECIAL_CHARS,
);

$newMember = filter_input_array(INPUT_POST, $MEMBER_FILTER);
$newMember['username'] = addslashes($_SESSION['dataInscription']['username']);
$newMember['password'] = password_hash(addslashes($_SESSION['dataInscription']['password']), PASSWORD_DEFAULT);
$newMember['mail'] = addslashes($newMember['mail']);
$newMember['name'] = addslashes($newMember['name']);
$newMember['lastName'] = addslashes($newMember['lastName']);


$files = MemberDAO::checkFiles($newMember);

$error = null;

if ($avatar != null){
    if ($avatar['size'] != 0 and $avatar['size'] <= 500000  and substr($avatar['type'],0,5) == "image"){
        $avatar = addFile($avatar);
    } else if ($avatar['size'] == 0) {
        $avatar = $files['avatar'];
        echo "<pre>";
        print_r($files);
        echo "</pre>";
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

echo "<pre>";
print_r($newMember);
echo "</pre>";
$result = MemberDAO::addMember($newMember, $avatar);

if (0!=$result and $error == null) {
    $_SESSION['member']['id'] = $result['id_User'];
    $_SESSION['member']['username'] = $result['username'];
    $_SESSION['member']['mail'] = $result['mail'];
    $_SESSION['member']['name'] = $result['name'];
    $_SESSION['member']['lastName'] = $result['lastName'];
    $_SESSION['member']['avatar'] = $result['avatar'];
    header('Location: ../member.php');
    exit();
} else {
    echo($error);
}