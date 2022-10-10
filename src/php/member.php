<?php

include "database.php";
$tittle = "Connection";
require 'header.php';

?>
<div id="page-container">
    <div id="content-wrap">
    <h1><?=$tittle?></h1>
        <div class="container">
            <form>
                <input type="text" name="classes" id="classes" placeholder="Classes" size="255" data-maxlength="255" data-type="CHAR" class="textfield">
            </form>
        </div>
    </div>
<?php
require "footer.php";
?>