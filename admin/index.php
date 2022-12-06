<?php

require_once "../configuration.php";
require_once ACCES_PATH . "TribeDAO.php";
require_once ACCES_PATH . "ClicDAO.php";
$clicInfo = ClicDAO::dailyClicStats();
$langInfo = ClicDAO::LangStats();
$tribeRaceInfo = TribeDAO::tribeRacesInfo();
$racetribe = TribeDAO::racePerTribe();
$weekDay = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
$tittle = "Dashboard";
foreach ($racetribe as $race){
    $tribes[] = $race['name'];
    $numberPerTribe[] = $race['number'];
}

foreach ($langInfo as $lang){
    $Lang[] = $lang['lang'];
    $clickPerLang[] = $lang['NClic'];
    $visitPerLang[] = $lang['NVisite'];
}
require 'admin-header.php';
?>

<div id="page-container">
    <div id="content-wrap">
        <h1><?=$tittle?></h1>
        <div class="container">
            <div class="row my-3">
                <a href="" class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Tribes races</h3>
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
                </a>
                <a href="" class="col-4 my-3 longlivecenter" style="justify-content: center">
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
                </a>
                <a href="clickPage.php" class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Daily Stats</h3>
                    <div class="chart-container3">
                        <canvas id="myChart3"></canvas>
                    </div>
                    <script>
                        <?php
                        $clicInfos = [];
                        $visitInfos = [];
                        $weekDays = [];
                        foreach ($clicInfo as $day) {
                            $weekDays[] = $weekDay[$day['DAI'] - 1];
                            $clicInfos[] = $day['NClic'];
                            $visitInfos[] = $day['NVisite'];
                        }?>
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
                                        label: 'Visit per day',
                                        backgroundColor: 'rgb(255, 99, 132)',
                                        borderColor: 'rgb(255, 99, 132)',
                                        data: <?=json_encode($clicInfos)?>
                                    }]
                            },

                            // Configuration options go here
                            options: {}
                        });
                    </script>
                </a>
                <a href="admin-list.php" class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Admin List</h3>
                    <img alt="admin Panel" src="../images/443119.png" width="407px">
                </a>
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Daily GIF</h3>
                    <a href="" id="itselfGif">
                        <img id="gif-wrap" src="" alt="GIF">
                    </a>
                    <div id="gif-logo"><button id="new-gif">New Gif</button>
                    <script>
                        (function() {
                            // Initiate gifLoop for set interval
                            var refresh;
                            // Duration count in seconds
                            const duration = 1000 * 10;
                            // Giphy API defaults
                            const giphy = {
                                baseURL: "https://api.giphy.com/v1/gifs/",
                                apiKey: "0UTRbFtkMxAplrohufYco5IY74U8hOes",
                                tag: "fail",
                                type: "random",
                                rating: "pg-13"
                            };
                            // Target gif-wrap container
                            const gif_wrap = document.getElementById("gif-wrap");
                            // Giphy API URL
                            let giphyURL = encodeURI(
                                giphy.baseURL +
                                giphy.type +
                                "?api_key=" +
                                giphy.apiKey +
                                "&tag=" +
                                giphy.tag +
                                "&rating=" +
                                giphy.rating
                            );

                            // Call Giphy API and render data
                            var newGif = () => $.getJSON(giphyURL, json => renderGif(json.data));

                            const gif_itself = document.getElementById("itselfGif");

                            // Display Gif in gif wrap container
                            var renderGif = _giphy => {
                                console.log(_giphy);
                                // Set gif as bg image
                                console.log(_giphy.images.original.url);
                                gif_wrap.src = _giphy.images.original.url + "";
                                gif_itself.href = _giphy.images.original.url + "";
                                // Start duration countdown
                                // refreshRate();
                            };

                            // Call for new gif after duration
                            // var refreshRate = () => {
                            // 	// Reset set intervals
                            // 	clearInterval(refresh);
                            // 	refresh = setInterval(function() {
                            // 		// Call Giphy API for new gif
                            // 		newGif();
                            // 	}, duration);
                            // };

                            // Call Giphy API for new gif
                            newGif();


                            const newGifButton = $('#new-gif');

                            newGifButton.click(newGif)

                        })();
                    </script>
                </div>
            </div>
                <a href="languagePage.php" class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Languages</h3>
                    <h5>Repartition of click depending on language</h5>
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
                </a>
            </div>
        </div>
    </div>
    <?php
    require "../footer.php";
    ?>
