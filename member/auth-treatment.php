<?php
require_once "../configuration.php";
require_once ACCES_PATH . "MemberDAO.php";
if(isset($_POST['auth']) ){
    $filtreMembre = array(
    'username' => FILTER_SANITIZE_SPECIAL_CHARS,
    'password' => FILTER_SANITIZE_ENCODED,
    );
    $member = filter_input_array(INPUT_POST, $filtreMembre);
    $member['username'] = addslashes($member['username']);
    $memberFound = MemberDAO::findMember($member);
}
//echo "<pre>";
//print_r($member);
//echo "</pre>";
//echo "<pre>";
//print_r($memberFound);
//echo "</pre>";
if (!empty($memberFound)){
    if (password_verify($member['password'], $memberFound['password'])) {
        $_SESSION['member']['id'] = $memberFound['id_User'];
        $_SESSION['member']['username'] = $memberFound['username'];
        $_SESSION['member']['mail'] = $memberFound['mail'];
        $_SESSION['member']['name'] = $memberFound['name'];
        $_SESSION['member']['lastName'] = $memberFound['lastName'];
//    echo("avatar ");
//    echo($memberFound['avatar']);
        $_SESSION['member']['avatar'] = $memberFound['avatar'];
    }
    if (isset($_SESSION['member']['username'])){
//    echo "<pre>";
//    echo ($_SESSION['member']['username']);
//    echo "</pre>";
    }
    else {
        $_SESSION['error'] = "Error wrong Password or Username !";
        echo "Connexion failed";
    }
}
else {
    $_SESSION['error'] = "Error wrong Password or Username !";
    //echo "Connexion failed";
}


header('Location: ../member.php');
exit();
