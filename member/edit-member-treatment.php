<?php
require_once "../configuration.php";
require_once ACCES_PATH . "MemberDAO.php";

if (!isset($_POST['Go'])) {

    if (!empty($_POST['NewPassword']) && !empty($_POST['NewPassword2']) && !empty($_POST['Password'])){
        $MEMBER_FILTER = array(
            'id' => FILTER_SANITIZE_NUMBER_INT,
            'username' => FILTER_SANITIZE_SPECIAL_CHARS,
            'mail' => FILTER_SANITIZE_SPECIAL_CHARS,
            'name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'lastName' => FILTER_SANITIZE_SPECIAL_CHARS,
            'NewPassword' => FILTER_SANITIZE_ENCODED,
        );
        $Member = filter_input_array(INPUT_POST, $MEMBER_FILTER);
        $Member['id'] = addslashes($Member['id']);
        $Member['username'] = addslashes($Member['username']);
        $Member['mail'] = addslashes($Member['mail']);
        $Member['name'] = addslashes($Member['name']);
        $Member['lastName'] = addslashes($Member['lastName']);
        $Member['NewPassword'] = password_hash($Member['NewPassword'], PASSWORD_DEFAULT);
        $memberFound = MemberDAO::findMember($Member);

        //  || !preg_match('/[a-zA-Z0-9]+/', $_POST['username']  )

        if ( ( !MemberDAO::isUsed($Member['username']) ) && $Member['id'] != $memberFound['id_User']|| !preg_match('/[a-zA-Z0-9]+/', $_POST['username']  )){
            $_SESSION['error'] = "Username already existing or not acceptable!";
            header('Location: edit-member.php');
            exit();
        }

        if ($_POST['NewPassword'] != $_POST['NewPassword2'] ){
            $_SESSION['error'] = "Error new password different!";
            header('Location: edit-member.php');
            exit();
        }

        if (!password_verify($_POST['Password'], $memberFound['password'])) {
            $_SESSION['error'] = "Error wrong password !";
            header('Location: edit-member.php');
            exit();
        }
    } else{
        if (!empty($_POST['NewPassword']) || !empty($_POST['NewPassword2']) || !empty($_POST['Password'])){
            $_SESSION['error'] = "The three input must be filed if you change password !";
            header('Location: edit-member.php');
            exit();
        }
        $MEMBER_FILTER = array(
            'id' => FILTER_SANITIZE_NUMBER_INT,
            'username' => FILTER_SANITIZE_SPECIAL_CHARS,
            'mail' => FILTER_SANITIZE_SPECIAL_CHARS,
            'name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'lastName' => FILTER_SANITIZE_SPECIAL_CHARS,
        );
        $Member = filter_input_array(INPUT_POST, $MEMBER_FILTER);
        $Member['id'] = addslashes($Member['id']);
        $Member['username'] = addslashes($Member['username']);
        $Member['mail'] = addslashes($Member['mail']);
        $Member['name'] = addslashes($Member['name']);
        $Member['lastName'] = addslashes($Member['lastName']);
        if(isset($_POST['NewPassword']) && $_POST['NewPassword2'] && $_POST['Password']){
            $Member['NewPassword'] = password_hash($Member['NewPassword'], PASSWORD_DEFAULT);
        }
        $memberFound = MemberDAO::findMember($Member);

        //  || !preg_match('/[a-zA-Z0-9]+/', $_POST['username']  )

        if ( ( !MemberDAO::isUsed($Member['username']) ) && $Member['id'] != $memberFound['id_User'] || !preg_match('/[a-zA-Z0-9]+/', $_POST['username'])){
            $_SESSION['error'] = "Username already existing or not acceptable!";
            header('Location: edit-member.php');
            exit();
        }
    }

    $avatar = $_FILES["avatar"];

    $files = MemberDAO::checkFiles($Member);

    $error = null;

    if ($avatar != null){
        if ($avatar['size'] != 0 and $avatar['size'] <= 500000  and substr($avatar['type'],0,5) == "image"){
            $avatar = addFile($avatar);
        } else if ($avatar['size'] == 0) {
            $avatar = $files['avatar'];
        } else {
            $error += "Image To Big";
//            echo "<pre>";
//            print("Image To Big");
//            echo "</pre>";
        }
    }

////    echo "<pre>";
////    print_r($Member);
////    echo "</pre>";
    $result = MemberDAO::editMember($Member, $avatar);


}
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
//    echo($error);
}

function addFile($file){
    $dossierCible = "../images/";
    $fichierCible = $dossierCible . basename($file["name"]);
    if (move_uploaded_file($file["tmp_name"], $fichierCible)) {
//        //echo("Succès lors du chargement du fichier.\n");
    }
    else {
//        echo("Erreur lors du chargement du fichier.\n");
    }
    return basename($file["name"]);
}

?>
