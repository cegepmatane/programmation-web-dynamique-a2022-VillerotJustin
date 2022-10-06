<?php

include "../database.php";

$SQL_REQUEST = "SELECT id_tribe, name, summary, logo, color FROM mtgTribe;";
$tribeListRequest = $database->prepare($SQL_REQUEST);
$tribeListRequest->execute();
$listeTribe = $tribeListRequest->fetchAll();

$tittle = "Tribes";
require 'admin-header.php';
?>

<div id="page-container">
    <div id="content-wrap">
        <h1><?=$tittle?></h1>
        <h2>Tribes list</h2>
        <div style="justify-content: center; display: flex;">
            <a href="add-tribe.php?>" class="btn btn-primary">Add a new Tribe</a>
        </div>
        <div class="container">
            <div class="row">
                <?php
                foreach ($listeTribe as $tribe){
                    ?>
                    <div class="mt-4" style="width: 20%;">
                        <div class="px-0 <?=$tribe['color']?> card">
                            <div style="background-color: rgb(255, 255, 255, 0.4)">
                                <img height="300" src="../images/<?=$tribe['logo']?>" alt="<?=$tribe['logo']?>" class="card-img-top ">
                            </div>
                            <div class="card-body border-dark rounded">
                                <h5 class="card-title"><?=$tribe['name']?> / <?=$tribe['color']?></h5>
                                <textarea style="border: solid grey 1px;" readonly class="resume bg-dark text-white" rows="5" cols="15" ><?=$tribe['summary']?></textarea>
                            </div>
                            <div class="card-footer longlivecenter">
                                <a href="edit.php?vers=<?=$tribe['id_tribe']?>" class="btn btn-success">Edit</a>
                                <a href="delete.php?vers=<?=$tribe['id_tribe']?>" class="btn btn-danger">Delete</a>
                                <a href="../detailed-tribe.php?vers=<?=$tribe['id_tribe']?>" class="btn btn-primary mt-1">See in detail</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
require "../footer.php";
?>
