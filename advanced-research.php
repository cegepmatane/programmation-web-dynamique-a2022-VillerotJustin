<?php
$tittle = "Advanced Research";
require 'header.php';
?>
<div id="page-container">
    <div id="content-wrap">
        <h1>Advanced Research</h1>
        <section id="contenu">
            <h2>Ask Fblthp</h2>
            <div class="container">
                <form>
                    <div class="form-group row my-2">
                        <label for="researchTittle" class="col-sm-2 col-form-label">Tribe Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="researchTittle" placeholder="Tribe Name">
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <textarea type="" class="form-control" id="researshContent" placeholder="Content"></textarea>
                        </div>
                    </div>
                    <fieldset class="form-group my-2">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        First radio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                        Second radio
                                    </label>
                                </div>
                                <div class="form-check disabled">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                                    <label class="form-check-label" for="gridRadios3">
                                        Third disabled radio
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row justify-content-center">
                        <button type="submit" class="btn btn-primary col-1">Search</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
<?php
require "footer.php";
?>



