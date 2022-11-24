<?php

require_once "../configuration.php";
require_once ACCES_PATH . "TribeDAO.php";
require_once ACCES_PATH . "ClicDAO.php";
$clicInfo = ClicDAO::dailyClicStats();
$langInfo = ClicDAO::dailyLangStats();
$tribeRaceInfo = TribeDAO::tribeRacesInfo();
$racetribe = TribeDAO::racePerTribe();
$weekDay = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
$tittle = "Dashboard";
require 'admin-header.php';
?>

<div id="page-container">
    <div id="content-wrap">
        <h1><?=$tittle?></h1>
        <div class="container">
            <div class="row mt-3">
                <div class="col-4 mt-3 longlivecenter" style="justify-content: center">
                    <h3>Tribes races</h3>
                    <table class="table table-dark table-striped align-middle my-3 insertRowTable w-auto longlivecenter">
                        <tr>
                            <th>Number of Races</th>
                            <th>Average races by tribes</th>
                            <th>Min races</th>
                            <th>Max races</th>
                        </tr>
                        <tr>
                            <th><?=$tribeRaceInfo['NumberRaces']?></th>
                            <th><?=$tribeRaceInfo['AVG']?></th>
                            <th><?=$tribeRaceInfo['Min']?></th>
                            <th><?=$tribeRaceInfo['Max']?></th>
                        </tr>
                    </table>
                    // TODO js graph tribe
                </div>
                <div class="col-4 mt-3 longlivecenter" style="justify-content: center">
                    <h3>Races by Tribe</h3>
                    <pre>
                        <?php print_r($racetribe)?>
                    </pre>
                    // TODO js graph tribe
                </div>
                <div class="col-4 mt-3 longlivecenter" style="justify-content: center">
                    <h3>Daily Stats</h3>
                    <table class="table table-dark table-striped align-middle my-3 insertRowTable w-auto longlivecenter">
                        <tr>
                            <th>Day</th>
                            <th>Clic</th>
                            <th>Visites</th>
                        </tr>
                        <?php
                        foreach ($clicInfo as $day){
                            ?>
                            <tr>
                                <th><?=$weekDay[$day['DAI']-1]?></th>
                                <th><?=$day['NClic']?></th>
                                <th><?=$day['NVisite']?></th>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    // TODO js graph tribe
                </div>
                <div class="col-4 mt-3 longlivecenter" style="justify-content: center">
                    <h3>Admin List</h3>
                    <a href="admin-list.php" class="btn btn-primary">Tribe List</a>
                    // TODO fancy thing
                </div>
            </div>
        </div>
    </div>
    <?php
    require "../footer.php";
    ?>
