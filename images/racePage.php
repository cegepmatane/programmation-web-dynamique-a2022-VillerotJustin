<?php
require_once "../configuration.php";
require_once ACCES_PATH . "ClicDAO.php";
$tittle = "Dashboard";
require 'admin-header.php';

$tribeRaceInfo = TribeDAO::tribeRacesInfo();
$racetribe = TribeDAO::racePerTribe();
?>
<div id="page-container">
    <div id="content-wrap">
        <h1><?=$tittle?></h1>
        <div class="container">
            <div class="row my-3">
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Data</h3>
                    <table class="table table-dark table-striped align-middle my-3 insertRowTable w-auto longlivecenter">
                        <tr>
                            <th>Number of Races</th>
                            <th>Average races by tribes</th>
                            <th>Min races</th>
                            <th>Max races</th>
                            <th>Ecart Type</th>
                        </tr>
                        <tr>
                            <th><?=$tribeRaceInfo['NumberRaces']?></th>
                            <th><?=$tribeRaceInfo['AVG']?></th>
                            <th><?=$tribeRaceInfo['Min']?></th>
                            <th><?=$tribeRaceInfo['Max']?></th>
                            <th><?=$tribeRaceInfo['Ecart']?></th>
                        </tr>
                    </table>
                </div>
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Data</h3>
                    <table class="table table-dark table-striped align-middle my-3 insertRowTable w-auto longlivecenter">
                        <tr>
                            <th>Tribe</th>
                            <th>Number</th>
                        </tr>
                        <?php
                        foreach ($racetribe as $race){
                            $tribes[] = $race['name'];
                            $numberPerTribe[] = $race['number'];
                            ?>
                            <tr>
                                <th><?=$race['name']?></th>
                                <th><?=$race['number']?></th>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Races by Tribe</h3>
                    <div class="char-contenair" style="width: 400px; margin: 50px auto;">
                        <canvas id="barChart"></canvas>

                        <script>
                            let labelPie = <?= json_encode($tribes)?>;
                            console.log(labelPie);
                            let dataPie = <?= json_encode($numberPerTribe)?>;
                            console.log(dataPie);
                            // graphique barre
                            const barChart = document.getElementById('barChart');
                            const graph3 = new Chart(barChart, {
                                type: 'bar',
                                data: {
                                    labels: labelPie,
                                    datasets: [{
                                        data: dataPie,
                                        backgroundColor: ['white', 'blue', 'black', 'red', 'green'],
                                        label: 'Tribes',
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: true,
                                    aspectRatio:1,
                                }
                            });
                        </script>


                    </div>
                </div>
        </div>
    </div>
    <?php
    require "../footer.php";
    ?>
