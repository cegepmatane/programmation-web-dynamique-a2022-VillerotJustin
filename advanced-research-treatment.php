<?php

require_once "configuration.php";
require_once ACCES_PATH . "TribeDAO.php";

$researshColor = array();
$fail = false;

$colorList = TribeDAO::colorList();
$count = 0;

foreach ($colorList as $color){
    if (!empty($_GET[$color['color']])){
        if ($_GET[$color['color']] == 1) {
            $researshColor[$count] = $color['color'];
        }
    }
    $count ++;
}

// print("Research color ");
// print_r($researshColor);

$researshTittle     = $_GET['researchTittle'];
$researshContent    = $_GET['researshContent'];
$results = TribeDAO::AdvanceResearsch($researshTittle, $researshContent, $researshColor, $fail);
$tittle = "Advanced Research Result";
require 'header.php';
?>
    <div id="page-container">
    <div id="content-wrap">
        <h1>Advanced Research</h1>
        <section id="contenu">
            <h2>Results</h2>
            <div class="container">
                <div class="row">
                    <?php
                    if (!empty($results)){
                        foreach ($results as $tribe){
                            ?>
                            <div class="mt-4" style="width: 20%;">
                                <div class="px-0 <?=$tribe['color']?> card">
                                    <div style="background-color: rgb(255, 255, 255, 0.4)">
                                        <img height="300" src="images/<?=$tribe['logo']?>" alt="<?=$tribe['logo']?>" class="card-img-top ">
                                    </div>
                                    <div class="card-body border-dark rounded">
                                        <h5 class="card-title"><?=$tribe['name']?> / <?=$tribe['color']?></h5>
                                        <p class="resume"  ><?=$tribe['summary']?></p>
                                    </div>
                                    <div class="card-footer longlivecenter">
                                        <a href="detailed-tribe.php?vers=<?=$tribe['id_Tribe']?>" class="btn btn-primary">See in detail</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else if ($fail) {
                        ?>
                        <h3 class="longlivecenter">Fblthp lost the way so he didn't found a thing</h3>
                        <img width="5" src="images/Fblthpthelost_1200x.webp" alt="Fblthp the lost">
                        <?php
                    } else {
                        ?>
                        <h3 class="longlivecenter">Fblthp found nothing.</h3>
                        <img width="5" src="images/Fblthpthelost_1200x.webp" alt="Fblthp the lost">
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
<?php
require "footer.php";
?>