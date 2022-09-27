<?php

include "basededonnes.php";

$MESSAGE_SQL_LISTE_TRIBES = "SELECT id_tribe, name, summary, logo, color FROM mtgTribe;";
$requeteListeTribe = $basededonnees->prepare($MESSAGE_SQL_LISTE_TRIBES);
$requeteListeTribe->execute();
$listeTribe = $requeteListeTribe->fetchAll();

$tittle = "Tribes";
require 'header.php';
?>

<div id="page-container">
    <div id="content-wrap">
        <h1><?=$tittle?></h1>
        <h2>Tribes list</h2>
        <div class="container">
            <div class="row">
                <?php
                foreach ($listeTribe as $tribe){
                    ?>
                    <div class="card col-4 mt-4 mx-1 <?=$tribe['color']?>" style="width: 18rem;">
                        <img height="300" src="images/<?=$tribe['logo']?>" alt="<?=$tribe['logo']?>" class="card-img-top ">
                        <div class="card-body border-dark rounded">
                            <h5 class="card-title"><?=$tribe['name']?> / <?=$tribe['color']?></h5>
                            <p class="resume"  ><?=$tribe['summary']?></p>

                        </div>
                        <div class="card-footer longlivecenter">
                            <a href="detailed-tribe.php?vers=<?=$tribe['id_tribe']?>" class="btn btn-primary ">See in detail</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
require "footer.php";
?>
