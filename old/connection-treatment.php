<?php
require_once "../configuration.php";
require_once ACCES_PATH . "TribeDAO.php";
$username = $_POST['psdknvqlj'];
$pswd = $_POST['jhgvzibca'];
$result = TribeDAO::connectionTreatment($username, $pswd);
if ($result != null){
    header('Location: admin-list.php?x=1');
    exit();
}
?>