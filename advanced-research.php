<?php
include "database.php";

$SQL_COLOR_REQUEST = "SELECT DISTINCT color FROM mtgTribe WHERE char_length(color)=1 OR color = 'ELDRA'";
$colorRequest = $database->prepare($SQL_COLOR_REQUEST);
$colorRequest->execute();
$colorList = $colorRequest->fetchAll();

$tittle = "Advanced Research";
require 'header.php';
?>
<div id="page-container">
    <div id="content-wrap">
        <h1>Advanced Research</h1>
        <section id="contenu">
            <h2>Ask Fblthp</h2>
            <div class="container mt-5">
                <form action="advanced-research-treatment.php" method="get">
                    <fieldset style="background-color: black; border: 1px purple solid;" class="rounded">
                        <legend class="longlivecenter">Inquire for Fblthp</legend>
                        <div class="m-2">
                            <div class="form-group row ml-1 my-2">
                                <label for="researchTittle" class="col-sm-2 col-form-label">Tribe Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="researchTittle" id="researchTittle" placeholder="Tribe Name">
                                </div>
                            </div>
                            <div class="form-group row ml-1 my-2">
                                <label for="researshContent" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="researshContent" id="researshContent" placeholder="Content"></textarea>
                                </div>
                            </div>
                            <div class="form-group row ml-1 my-2">
                                <div class="justify-content-center">
                                    <fieldset>
                                        <legend class="longlivecenter">Color</legend>
                                        <div class="row justify-content-center">
                                            <?php
                                            if (!empty($colorList)){
                                                foreach ($colorList as $color){
                                                    ?>
                                                        <div class="longlivecenter">
                                                            <input type="hidden" name="<?=$color['color']?>" value="0">
                                                            <input type="checkbox"
                                                                   name="<?=$color['color']?>"
                                                                   id="<?=$color['color']?>"
                                                                   value="1"
                                                            >
                                                            <?=$color['color']?>
                                                            <br>
                                                        </div>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <h3 class="longlivecenter">Fblthp lost the way so he didn't found the colors</h3>
                                                <img width="5" src="images/Fblthpthelost_1200x.webp">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <button type="submit" class="btn btn-primary col-1">Search</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </div>
<?php
require "footer.php";
?>



