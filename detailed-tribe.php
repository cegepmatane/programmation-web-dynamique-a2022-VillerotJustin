<?php

include "database.php";
$id = filter_var($_GET['vers'], FILTER_SANITIZE_NUMBER_INT);

$SQL_REQUEST = "SELECT * FROM mtgTribe WHERE id_tribe = :id;";
$detailedTribeRequest = $database->prepare($SQL_REQUEST);
$detailedTribeRequest->bindParam(':id', $id, PDO::PARAM_INT);
$tribe = $detailedTribeRequest->execute();
$tribe = $detailedTribeRequest->fetch();
$tittle = $tribe['name'];
require 'header.php';

?>
<div id="page-container">
    <div id="content-wrap">
        <h1><?=$tittle?></h1>
        <div class="container">
            <div class="row">
                <div class="col-10" id="image" style=" background-image: url('images/<?=$tribe['backgroung']?>');">
                    <div id="Overlay">
                        <div class="container">
                            <div class="row">
                                <p class="row"><?=$tribe['dsc']?></p>
                            </div>
                            <div class="row">
                                <p class="row"><?=$tribe['mechanics']?></p>
                            </div>
                            <div class="row">
                                <h2 class="row longlivecenter">Races</h2>
                                <p class="row"><?=$tribe['races']?></p>
                            </div>
                            <div class="row">
                                <h2 class="row longlivecenter">Classes</h2>
                                <p class="row"><?=$tribe['classes']?></p>
                            </div>
                            <div class="row">
                                <h2 class="row longlivecenter">Important Characters</h2>
                                <p class="row"><?=$tribe['personage']?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card col-4 mt-4 mx-1 <?=$tribe['color']?>" style="width: 18rem;">
                        <div style="background-color: rgb(255, 255, 255, 0.4)">
                            <img height="300" src="images/<?=$tribe['logo']?>" alt="<?=$tribe['logo']?>" class="card-img-top ">
                        </div>
                        <div class="card-body border-dark rounded">
                            <h5 class="card-title">Color: <?=$tribe['color']?></h5>
                            <p class="resume"  ><?=$tribe['summary']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php


require "footer.php";
?>