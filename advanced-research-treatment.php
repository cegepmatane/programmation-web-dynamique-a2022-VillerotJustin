<?php
include "database.php";

$researshColor = array();

$SQL_COLOR_REQUEST = "SELECT DISTINCT color FROM mtgTribe;";
$colorRequest = $database->prepare($SQL_COLOR_REQUEST);
$colorRequest->execute();
$colorList = $colorRequest->fetchAll();
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
$fail = false;
if (!empty($researshTittle) || !empty($researshContent) || !empty($researshColor)){
    $ADVANCED_RESEARCH_SQL = "SELECT * FROM mtgTribe WHERE ";
    $second = false;
    if (!empty($researshTittle)){
        $ADVANCED_RESEARCH_SQL = $ADVANCED_RESEARCH_SQL . "(name like '%$researshTittle%')";
        $second = true;
    }
    if (!empty($researshContent)){
        if ($second){
            $ADVANCED_RESEARCH_SQL = $ADVANCED_RESEARCH_SQL . " AND ";
        }
        $ADVANCED_RESEARCH_SQL = $ADVANCED_RESEARCH_SQL . "((summary like '%$researshContent%') OR (dsc like '%$researshContent%'))";
        $second = true;
    }
    if (!empty($researshColor)){
        if ($second){
            $ADVANCED_RESEARCH_SQL = $ADVANCED_RESEARCH_SQL . " AND ";
        }
        $ADVANCED_RESEARCH_SQL = $ADVANCED_RESEARCH_SQL . " ( ";
        // last element
        foreach ($researshColor as $color){
            $lastElement = $color;
        }
        foreach ($researshColor as $color){
            $ADVANCED_RESEARCH_SQL = $ADVANCED_RESEARCH_SQL . "(color = '$color')";
            if ($color != $lastElement){
                $ADVANCED_RESEARCH_SQL = $ADVANCED_RESEARCH_SQL . " OR ";
            }
        }
        $ADVANCED_RESEARCH_SQL = $ADVANCED_RESEARCH_SQL . " ) ";
    }
    $ADVANCED_RESEARCH_SQL = $ADVANCED_RESEARCH_SQL . ";";
    // print_r($ADVANCED_RESEARCH_SQL);
    $advancedResearchRequest = $database->prepare($ADVANCED_RESEARCH_SQL);
    $advancedResearchRequest->execute();
    $results = $advancedResearchRequest->fetchAll();
    if (!empty($resultats)){$fail = true;}
}

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
                            <div class="card col-4 mt-4 mx-1 <?=$tribe['color']?>" style="width: 18rem;">
                                <img height="300" src="images/<?=$tribe['logo']?>" alt="<?=$tribe['logo']?>" class="card-img-top ">
                                <div class="card-body border-dark rounded">
                                    <h5 class="card-title"><?=$tribe['name']?> / <?=$tribe['color']?></h5>
                                    <p class="resume"  ><?=$tribe['summary']?></p>

                                </div>
                                <div class="card-footer longlivecenter">
                                    <a href="detailed-tribe.php?vers=<?=$tribe['id_Tribe']?>" class="btn btn-primary">See in detail</a>
                                </div>
                            </div>
                            <?php
                        }
                    } else if ($fail) {
                        ?>
                        <h3 class="longlivecenter">Fblthp lost the way so he didn't found a thing</h3>
                        <img width="5" src="images/Fblthpthelost_1200x.webp">
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