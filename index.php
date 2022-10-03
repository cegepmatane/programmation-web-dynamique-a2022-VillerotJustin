<?php

$tittle = "Home";
require 'header.php';
?>
<div id="page-container">
    <div id="content-wrap" class="justify-content-center falseRow">
        <div class="col-10 mt-3">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <a class="carousel-item active" href="index.php" style="text-decoration: none">
                            <img class="d-block w-100" src="images/custom_infinity_mirrors.webp" alt="Home Image">
                        <div class="carousel-caption d-none d-md-block carouselObject rounded">
                            <h5>Home</h5>
                            <p>The page you are currently admiring.</p>
                        </div>
                    </a>
                    <a class="carousel-item" href="tribe-list.php" style="text-decoration: none">
                        <img class="d-block w-100" src="images/guilds_of_ravnica.jpg" alt="Tribe & Guild List image">
                        <div class="carousel-caption d-none d-md-block carouselObject rounded">
                            <h5>Tribe & Guild List</h5>
                            <p>A list of every tribe and guild in magic the gathering.</p>
                        </div>
                    </a>
                    <a class="carousel-item" href="member.php" style="text-decoration: none">
                        <img class="d-block w-100" src="images/member.png" alt="Member image">
                        <div class="carousel-caption d-none d-md-block carouselObject rounded">
                            <h5>Member</h5>
                            <p>Your profile page.</p>
                        </div>
                    </a>
                    <a class="carousel-item" href="advanced-research.php" style="text-decoration: none">
                        <img class="d-block w-100" src="images/Fblthp.jpg" alt="Research image">
                        <div class="carousel-caption d-none d-md-block carouselObject rounded">
                            <h5>Research</h5>
                            <p>Ask Fblthp what pass in your mind.</p>
                        </div>
                    </a>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <a href="lost.php" style="color: rgba(0, 0, 0, 0);">Fblthp</a>
        </div>
    </div>
<?php

require 'footer.php';
?>
