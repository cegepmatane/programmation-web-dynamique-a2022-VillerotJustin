<?php

$tittle = "Sign In";
require 'header.php';
?>

<div id="page-container">
    <div id="content-wrap">
        <div class="container">
            <br><br><br><br><br><br>
            <div style="background: black; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                <div class="m-3">
                    <h1 class="py-3"><?=$tittle?></h1>
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <!-- Pills content -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                                    <form method="post" action="admin/connection-treatment.php">

                                        code : admin admin

                                        <!-- Email input -->
                                        <div>
                                            <input type="text" id="psdknvqlj" name="psdknvqlj" class="form-control" placeholder="username"/>
                                            <label class="form-label" for="psdknvqlj">Email or username</label>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="jhgvzibca" name="jhgvzibca" class="form-control" placeholder="password" />
                                            <label class="form-label" for="jhgvzibca">Password</label>
                                        </div>

                                        <!-- Submit button -->
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require "footer.php";
    ?>
