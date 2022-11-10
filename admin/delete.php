<?php
require_once "../configuration.php";
require_once ACCES_PATH . "TribeDAO.php";
$id = $_GET['vers'];
$result = TribeDAO::deleteTribe($id);
if (0!=$result){
    header('Location: index.php?x=3');
    exit();
}

?>