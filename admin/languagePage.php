<?php
require_once "../configuration.php";
require_once ACCES_PATH . "ClicDAO.php";
$tittle = "Dashboard";
require 'admin-header.php';

$DailylangInfo = ClicDAO::dailyLangStats();
$langInfo = ClicDAO::LangStats();
$weekDay = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

?>
<div id="page-container">
    <div id="content-wrap">
        <h1><?=$tittle?></h1>
        <div class="container">
            <div class="row my-3">
                </pre>
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Data</h3>
                    <table class="table table-dark table-striped align-middle my-3 insertRowTable w-auto longlivecenter">
                        <tr>
                            <th>Day</th>
                            <th>Lang</th>
                            <th>Clic</th>
                            <th>Visites</th>
                        </tr>
                        <?php
                        foreach ($langInfo as $lang){
                            $Lang[] = $lang['lang'];
                            $clickPerLang[] = $lang['NClic'];
                            $visitPerLang[] = $lang['NVisite'];
                        }
                        $clicInfos = [];
                        $visitInfos = [];
                        $weekDays = [];
                        $langInfos = [];
                        foreach ($DailylangInfo as $day){
                            $weekDays[] = $weekDay[$day['DAI']-1];
                            $langInfos[] = $day['lang'];
                            $clicInfos[] = $day['NClic'];
                            $visitInfos[] = $day['NVisite'];
                            ?>
                            <tr>
                                <th><?=$weekDay[$day['DAI']-1]?></th>
                                <th><?=$day['lang']?></th>
                                <th><?=$day['NClic']?></th>
                                <th><?=$day['NVisite']?></th>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Repartition of click depending on language</h3>
                    <div class="chart-container">
                        <canvas id="myChart"></canvas>
                    </div>
                    <script>
                        const ctx = document.getElementById('myChart');
                        const myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: <?=json_encode($Lang)?>,
                                datasets: [{
                                    label: '# of Votes',
                                    data: <?=json_encode($clickPerLang)?>,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true
                            }
                        });
                    </script>
                </div>
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Repartition of visit depending on language</h3>
                    <div class="chart-container">
                        <canvas id="myChart2"></canvas>
                    </div>
                    <script>
                        const ctx2 = document.getElementById('myChart2');
                        const myChart2 = new Chart(ctx2, {
                            type: 'pie',
                            data: {
                                labels: <?=json_encode($Lang)?>,
                                datasets: [{
                                    label: '# of Votes',
                                    data: <?=json_encode($visitPerLang)?>,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true
                            }
                        });
                    </script>
                </div>
        </div>
    </div>
    <?php
    require "../footer.php";
    ?>
