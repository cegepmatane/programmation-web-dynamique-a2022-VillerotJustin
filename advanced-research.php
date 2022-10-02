<?php
include "database.php";

$SQL_COLOR_REQUEST = "SELECT DISTINCT color FROM mtgTribe;";
$colorRequest = $dataBase->prepare($SQL_COLOR_REQUEST);
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
                <form>
                    <fieldset style="background-color: black; border: 1px purple solid;" class="rounded">
                        <legend class="longlivecenter">Inquire for Fblthp</legend>
                        <div class="m-2">
                            <div class="form-group row ml-1 my-2">
                                <label for="researchTittle" class="col-sm-2 col-form-label">Tribe Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="researchTittle" placeholder="Tribe Name">
                                </div>
                            </div>
                            <div class="form-group row ml-1 my-2">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <textarea type="" class="form-control" id="researshContent" placeholder="Content"></textarea>
                                </div>
                            </div>
                            <fieldset style="border: 1px purple solid;" class="form-group ml-1 my-2">
                                <legend class="col-form-label col-sm-2 pt-0">Color</legend>
                                <?php
                                if (!empty($colorList)){
                                    foreach ($colorList as $color){
                                        ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Color_<?=$color?>" id="Color_<?=$color?>" value="<?=$color?>" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                <?=$color?>
                                            </label>
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
                            </fieldset>
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



