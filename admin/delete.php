<?php

include "../database.php";
$id = $_GET['vers'];

$SQL_DELETE_REQUEST = "Delete FROM mtgTribe WHERE id_Tribe =" . $id . ";";
$deleteRequest = $database->prepare($SQL_DELETE_REQUEST);
$result = $deleteRequest->execute();
if (0!=$result){
    header('Location: admin-tribe-list.php?x=3');
    exit();
}

?>