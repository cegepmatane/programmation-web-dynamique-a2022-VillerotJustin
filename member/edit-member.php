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
                <span id="error">
                    <?php
                    if (!empty($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                </span>
                <input hidden id="id" name="id" value="<?=$_SESSION['member']['id']?>">
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
                            Avatar (leave blank if unchanged)
                            <img alt="current avatar" src="../images/<?=$_SESSION['member']['avatar']?>" height="100" width="100">
                        </td>
                        <td>
                            <input type="file" name="avatar" id="avatar">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="longlivecenter">
                            Security<br>
                            Leave blank if unchanged
                        </td>
                    </tr>
                    <tr>
                        <td class="longlivecenter">
                            New Password
                        </td>
                        <td>
                            <input type="Password" name="NewPassword" id="NewPassword" value="" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                        </td>
                    </tr>
                    <tr>
                        <td class="longlivecenter">
                            Confirm New Password
                        </td>
                        <td>
                            <input type="Password" name="NewPassword2" id="NewPassword2" value="" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                        </td>
                    </tr>
                    <tr>
                        <td class="longlivecenter">
                            Old Password
                        </td>
                        <td>
                            <input type="Password" name="Password" id="Password" value="" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="2" class="tblFooters justify-content-center">
                            <input class="btn btn-primary" type="submit" value="Go">
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
<?php
require "../footer.php";
?>