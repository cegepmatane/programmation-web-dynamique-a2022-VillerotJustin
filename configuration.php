<?php
$adresseCourante = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$estSurServeurTiweb = strpos($adresseCourante, 'tiweb.cgmatane.qc.ca') !== false ? true : false;

if ($estSurServeurTiweb) {
    define("ACCES_PATH", $_SERVER["DOCUMENT_ROOT"] . "/etudiants/2022/villerotj/access/");
} else {
    define("ACCES_PATH", $_SERVER["DOCUMENT_ROOT"] . "/access/");
}