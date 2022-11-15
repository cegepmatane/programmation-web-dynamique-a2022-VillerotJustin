<?php

require_once "../configuration.php";
$tittle = "Inscription";
require_once "member-header.php";
?>

<div id="page-container">
    <div id="content-wrap">
        <div class="container">
            <br><br><br><br><br><br>
            <form action="create-member2.php" method="post" class="justify-content-center">
                <fieldset style="border: purple solid 3px" class="longlivecenter justify-content-center">
                    <legend>Inscription 1/2</legend>
                    <div class="justify-content-center">
                        <span id="error">
                            <?php
                            if (!empty($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                            ?>
                        </span>
                        <table class="table table-dark table-striped align-middle my-3 insertRowTable w-auto">
                            <thead>
                            <tr>
                                <th>Input</th>
                                <th>Value</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="longlivecenter">
                                    Username
                                </td>
                                <td>
                                    <input type="text" name="username" id="username" value="" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                                </td>
                            </tr>
                            <tr>
                                <td class="longlivecenter">
                                    Password
                                </td>
                                <td>
                                    <input type="password" name="password" id="password" value="" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                                </td>
                            </tr>
                            <tr>
                                <td class="longlivecenter">
                                    Confirm-Password
                                </td>
                                <td>
                                    <input type="password" name="password2" id="password2" value="" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                                </td>
                            </tr>
                            <tfoot>
                            <tr class="justify-content-center">
                                <th colspan="2" class="tblFooters justify-content-center">
                                    <input class="btn btn-primary" type="submit" value="Go" id="Go">
                                </th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </fieldset>
            </form>

        </div>
    </div>
    <?php
    require "../footer.php";
    ?>
