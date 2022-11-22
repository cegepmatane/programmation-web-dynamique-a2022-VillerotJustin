<?php
require_once "configuration.php";
require_once ACCES_PATH ."MemberDAO.php";
$tittle = "membre";
require_once "header.php";
?>
<div id="page-container">
    <div id="content-wrap">
        <div class="container">
            <br><br><br><br><br><br>
            <h1 class="py-3 longlivecenter"><?=$tittle?></h1>
            <div class="longlivecenter">
                <span id="error" class=" error longlivecenter">
                <?php
                if (!empty($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            </span>
            </div>
            <?php
            // afficher is conneter
            if(empty($_SESSION['member']['username'])){
                include_once "member/auth.php";
            } else {
                include_once "member/member-page.php";
                ?>
                <div>
                    <a href="member/log-out.php" class="text-center mx-1">
                        <button type="" class="btn btn-primary btn-block mb-4">Log Out</button>
                    </a>
                    <a href="member/edit-member.php" class="text-center">
                        <button type="" class="btn btn-primary btn-block mb-4">Edit</button>
                    </a>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
    <?php
    require "footer.php";
    ?>



