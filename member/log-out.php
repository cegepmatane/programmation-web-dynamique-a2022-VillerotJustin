<?php
require_once "../configuration.php";
require_once ACCES_PATH . "MemberDAO.php";
if (isset($_SESSION['member'] ['username'])){
    session_unset();
    session_destroy();
    header('location: ../member.php');
} else {
    echo "not connected";
}