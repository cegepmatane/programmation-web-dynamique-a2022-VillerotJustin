<?php

include "../database.php";
$username = $_POST['psdknvqlj'];
$pswd = $_POST['jhgvzibca'];

$SQL_REQUEST =
    "SELECT * FROM User 
         WHERE username = '$username' 
           AND password = '$pswd';";
$connectionRequest = $database->prepare($SQL_REQUEST);
$connectionRequest->execute();
$result = $connectionRequest->fetchAll();


if (!empty($result)){
    header('Location: admin-tribe-list.php');
    exit();
}
?>