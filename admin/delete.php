<?php
require_once "../configuration.php";
require_once ACCES_PATH . "TribeDAO.php";
$id = $_GET['vers'];
$result = TribeDAO::deleteTribe($id);
if (0!=$result){
    header('Location: admin-list.php?x=3');
    exit();
}

?>