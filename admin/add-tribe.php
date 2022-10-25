<?php
$tittle = "AddTribe";
require 'admin-header.php';
?>
    <div id="page-container">
        <div id="content-wrap" class="container longlivecenter">
            <br>
            <h1 class="py-3"><?=$tittle?></h1>
            <br>
            <div class="d-flex justify-content-center">
                <form class="justify-content-center" action="add-tribe-treatment.php" method="post" enctype="multipart/form-data">
                    <table class="table table-dark table-striped align-middle my-3 insertRowTable w-auto">
                        <thead>
                        <tr>
                            <th>Input</th>
                            <th>Value</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th colspan="5" class="tblFooters text-end">
                                <input class="btn btn-primary" type="submit" value="Go">
                            </th>
                        </tr>
                        </tfoot><tbody>
                        <tr>
                            <td class="longlivecenter">
                                Name
                            </td>
                            <td>
                                <input type="text" name="name" id="name" placeholder="Tribe Name" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                            </td>
                        </tr>
                        <tr>
                            <td class="longlivecenter">
                                Summary
                            </td>
                            <td>
                                <textarea name="summary" id="summary" data-type="CHAR" dir="ltr" rows="15" cols="40"  class="valid" aria-invalid="false"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="longlivecenter">
                                Description
                            </td>
                            <td>
                                <textarea name="description" id="description" data-type="CHAR" dir="ltr" rows="15" cols="40" ></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="longlivecenter">
                                Logo
                            </td>
                            <td>
                                <input type="file" name="logo" id="logo">
                            </td>
                        </tr>
                        <tr>
                            <td class="longlivecenter">
                                Color
                            </td>
                            <td>
                                <input type="text" name="color" id="color" placeholder="colortag ex B for black" data-maxlength="6" data-type="CHAR" class="textfield">
                            </td>
                        </tr>
                        <tr>
                            <td class="longlivecenter">
                                Races
                            </td>
                            <td>
                                <textarea name="races" id="races" data-type="CHAR" dir="ltr" rows="15" cols="40"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="longlivecenter">
                                Mechanics
                            </td>
                            <td>
                                <textarea name="mechanics" id="mechanics" data-type="CHAR" dir="ltr" rows="15" cols="40" ></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="longlivecenter">
                                Classes
                            </td>
                            <td>
                                <textarea name="classes" id="classes" data-type="CHAR" dir="ltr" rows="15" cols="40"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="longlivecenter">
                                Personage
                            </td>
                            <td>
                                <textarea name="personage" id="personage" data-type="CHAR" dir="ltr" rows="15" cols="40"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="longlivecenter">
                                Background
                            </td>
                            <td>
                                <input type="file" name="backgroung" id="backgroung">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>

        </div>
<?php
require "../footer.php";
?>