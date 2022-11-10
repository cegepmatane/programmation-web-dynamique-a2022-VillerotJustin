<?php
require_once "../configuration.php";
require_once ACCES_PATH . "MemberDAO.php";
$tittle = "EditTribe profile";
require 'member-header.php';
?>
    <div id="page-container">
    <div id="content-wrap" class="container longlivecenter">
        <br>
        <h1 class="py-3"><?=$tittle?></h1>
        <br>
        <div class="d-flex justify-content-center">
            <form class="justify-content-center" action="edit-member-treatment.php" method="post" enctype="multipart/form-data">
                <input hidden id="id" name="id" value="<?=$_SESSION['member']['id']?>">id :<?=$_SESSION['member']['id']?>
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
                            Username
                        </td>
                        <td>
                            <input type="text" name="username" id="username" value="<?=$_SESSION['member']['username']?>" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                        </td>
                    </tr>
                    <tr>
                        <td class="longlivecenter">
                            Mail
                        </td>
                        <td>
                            <input type="text" name="mail" id="mail" value="<?=$_SESSION['member']['mail']?>" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                        </td>
                    </tr>
                    <tr>
                        <td class="longlivecenter">
                            Name
                        </td>
                        <td>
                            <input type="text" name="name" id="name" value="<?=$_SESSION['member']['name']?>" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                        </td>
                    </tr>
                    <tr>
                        <td class="longlivecenter">
                            Last Name
                        </td>
                        <td>
                            <input type="text" name="lastName" id="lastName" value="<?=$_SESSION['member']['lastName']?>" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                        </td>
                    </tr>
                    <tr>
                        <td class="longlivecenter">
                            Avatar Leave blank if do not change.
                            <img src="../images/<?=$_SESSION['member']['avatar']?>" height="100" width="100">
                        </td>
                        <td>
                            <input type="file" name="avatar" id="avatar">
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