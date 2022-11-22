<?php

require_once "../configuration.php";
require_once ACCES_PATH . "TribeDAO.php";

$msg = $_GET['x'];

$listeTribe = TribeDAO::listTribes();
$tittle = "Dashboard";
require 'admin-header.php';
?>

<div id="page-container">
    <div id="content-wrap">
        <h1><?=$tittle?></h1>
        <div class="container">

        </div>
    </div>
    <?php
    require "../footer.php";
    ?>
