<?php
require_once "../configuration.php";
require_once ACCES_PATH . "ClicDAO.php";
$tittle = "Clics & visit Info";
require 'admin-header.php';

$clicInfo = ClicDAO::dailyClicStats();
$weekDay = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

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
                            <th>Day</th>
                            <th>Clic</th>
                            <th>Visites</th>
                        </tr>
                        <?php
                        $clicInfos = [];
                        $visitInfos = [];
                        $weekDays = [];
                        foreach ($clicInfo as $day){
                            $weekDays[] = $weekDay[$day['DAI']-1];
                            $clicInfos[] = $day['NClic'];
                            $visitInfos[] = $day['NVisite'];
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
                </div>
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Click per day</h3>
                    <div class="chart-container">
                        <canvas id="myChart"></canvas>
                    </div>
                    <script>
                        const ctx = document.getElementById('myChart').getContext('2d');
                        const chart = new Chart(ctx, {
                            // The type of chart we want to create
                            type: 'line',

                            // The data for our dataset
                            data: {
                                labels: <?=json_encode($weekDays)?>,
                                datasets: [{
                                    label: 'Click per day',
                                    backgroundColor: 'rgb(255, 99, 132)',
                                    borderColor: 'rgb(255, 99, 132)',
                                    data: <?=json_encode($clicInfos)?>
                                }]
                            },

                            // Configuration options go here
                            options: {}
                        });
                    </script>
                </div>
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Visit per day</h3>
                    <div class="chart-container2">
                        <canvas id="myChart2"></canvas>
                    </div>
                    <script>
                        const ctx2 = document.getElementById('myChart2').getContext('2d');
                        const chart2 = new Chart(ctx2, {
                            // The type of chart we want to create
                            type: 'line',

                            // The data for our dataset
                            data: {
                                labels: <?=json_encode($weekDays)?>,
                                datasets: [{
                                    label: 'Visit per day',
                                    backgroundColor: 'rgb(132, 99, 255)',
                                    borderColor: 'rgb(132, 99, 255)',
                                    data: <?=json_encode($visitInfos)?>
                                }]
                            },

                            // Configuration options go here
                            options: {}
                        });
                    </script>
                </div>
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Daily Stats</h3>
                    <div class="chart-container3">
                        <canvas id="myChart3"></canvas>
                    </div>
                    <script>
                        const ctx3 = document.getElementById('myChart3').getContext('2d');
                        const chart3 = new Chart(ctx3, {
                            // The type of chart we want to create
                            type: 'line',

                            // The data for our dataset
                            data: {
                                labels: <?=json_encode($weekDays)?>,
                                datasets: [
                                    {
                                    label: 'Visit per day',
                                    backgroundColor: 'rgb(132, 99, 255)',
                                    borderColor: 'rgb(132, 99, 255)',
                                    data: <?=json_encode($visitInfos)?>
                                },
                                    {
                                    label: 'Click per day',
                                    backgroundColor: 'rgb(255, 99, 132)',
                                    borderColor: 'rgb(255, 99, 132)',
                                    data: <?=json_encode($clicInfos)?>
                                }]
                            },

                            // Configuration options go here
                            options: {}
                        });
                    </script>
                </div>

        </div>
    </div>
    <?php
    require "../footer.php";
    ?>
