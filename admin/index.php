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
foreach ($racetribe as $race){
    $tribes[] = $race['name'];
    $numberPerTribe[] = $race['number'];
}
require 'admin-header.php';
?>

<div id="page-container">
    <div id="content-wrap">
        <h1><?=$tittle?></h1>
        <div class="container">
            <div class="row my-3">
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
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
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
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
                </div>
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Admin List</h3>
                    <a href="admin-list.php" class="btn btn-primary">Tribe List</a>
                    // TODO fancy thing
                </div>
                <div class="col-4 my-3 longlivecenter" style="justify-content: center">
                    <h3>Daily GIF</h3>
                    <img id="gif-wrap" src="" alt="GIF">
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

                            // Display Gif in gif wrap container
                            var renderGif = _giphy => {
                                console.log(_giphy);
                                // Set gif as bg image
                                console.log(_giphy.images.original.url);
                                gif_wrap.src = _giphy.images.original.url + "";

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
        </div>
    </div>
    <?php
    require "../footer.php";
    ?>
