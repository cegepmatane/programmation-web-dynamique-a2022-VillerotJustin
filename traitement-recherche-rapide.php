<?php
// print_r($_GET['mot']);
$mot = $_GET['mot'];

include "basededonnes.php";

$SQL_RECHERCHE_RAPIDE = "
SELECT * 
FROM mtgTribe
WHERE name LIKE '%$mot%'
    OR summary LIKE '%$mot%'
    OR races LIKE '%$mot%'
    OR mechanics LIKE '%$mot%'
    OR classes LIKE '%$mot%'
    OR personage LIKE '%$mot%'
";

$requeteRechercheRapide = $basededonnees->prepare($SQL_RECHERCHE_RAPIDE);
$requeteRechercheRapide->execute();
$resultats = $requeteRechercheRapide->fetchAll();
$tittle = "Result research";
require 'header.php';
?>
<div id="page-container">
    <div id="content-wrap">
        <h1>Tribus</h1>
        <section id="contenu">
            <h2>Result research</h2>
            <div class="container">
                <div class="row">
                    <?php
                    foreach ($resultats as $tribe){
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
                    ?>
                </div>
            </div>
        </section>
    </div>
<?php
require "footer.php";
?>



