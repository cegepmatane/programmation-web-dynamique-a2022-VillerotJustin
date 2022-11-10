<?php
require_once "../configuration.php";
require_once ACCES_PATH . "MemberDAO.php";
if(isset($_POST['auth']) ){
    $filtreMembre = array();
    $filtreMembre['psdknvqlj'] = FILTER_SANITIZE_SPECIAL_CHARS;
    $filtreMembre['jhgvzibca'] = FILTER_SANITIZE_SPECIAL_CHARS;
    $member = filter_input_array(INPUT_POST, $filtreMembre);
    $memberFound = MemberDAO::findMember($member);
}
if (password_verify($member['jhgvzibca'], $memberFound['password'])) {
    $_SESSION['member']['id'] = $memberFound['id_User'];
    $_SESSION['member']['username'] = $memberFound['username'];
    $_SESSION['member']['mail'] = $memberFound['mail'];
    $_SESSION['member']['name'] = $memberFound['name'];
    $_SESSION['member']['lastName'] = $memberFound['lastName'];
    echo("avatar ");
    echo($memberFound['avatar']);
    $_SESSION['member']['avatar'] = $memberFound['avatar'];
}
header('Location: ../member.php');
exit();
