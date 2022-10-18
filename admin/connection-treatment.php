<?php

include "../database.php";
$username = $_POST['psdknvqlj'];
$pswd = $_POST['jhgvzibca'];

$SQL_REQUEST =
    "SELECT * FROM User 
         WHERE username = '$username' 
           AND password = '$pswd';";
$connectionRequest = $database->prepare($SQL_REQUEST);
$result = $connectionRequest->execute();


if (0!=$result){
    header('Location: admin-tribe-list.php?x=1');
    exit();
}
?>