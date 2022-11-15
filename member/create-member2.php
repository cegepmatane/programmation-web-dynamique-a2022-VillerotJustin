<?php

require_once "../configuration.php";
require ACCES_PATH . "MemberDAO.php";
$tittle = "Inscription";

if (!isset($_POST['Go'])) {
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2'])) {
        $_SESSION['error'] = "Error all fiel are required!";
    }
    if ($_POST['password'] != $_POST['password2'] ){
        $_SESSION['error'] = "Error password different!";
    }
    if (!MemberDAO::isUsed($_POST['username']) || !preg_match('/[a-zA-Z0-9]+/', $_POST['username'])){
        $_SESSION['error'] = "Username already existing or not acceptable!";
    }
}
if (isset($_SESSION['error'])) {
    header('Location: create-member.php');
    exit();
}

$MEMBER_FILTER = array(
    'username' => FILTER_SANITIZE_SPECIAL_CHARS,
    'password' => FILTER_SANITIZE_SPECIAL_CHARS,
);

$tempMember = filter_input_array(INPUT_POST, $MEMBER_FILTER);
$tempMember['username'] = addslashes($tempMember['username']);
$tempMember['password'] = password_hash(addslashes($tempMember['password']), PASSWORD_DEFAULT);

$_SESSION['dataInscription']['username'] = $tempMember['username'];
$_SESSION['dataInscription']['password'] = $tempMember['password'];


require_once "member-header.php";
?>

<div id="page-container">
    <div id="content-wrap">
        <div class="container">
            <br><br><br><br><br><br>
            <form action="create-member-treatment.php" method="post">
                <fieldset style="border: purple solid 3px" class="longlivecenter justify-content-center">
                    <legend>Inscription 2/2</legend>
                    <div>
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
                                    Mail
                                </td>
                                <td>
                                    <input type="text" name="mail" id="mail" value="" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                                </td>
                            </tr>
                            <tr>
                                <td class="longlivecenter">
                                    Name
                                </td>
                                <td>
                                    <input type="text" name="name" id="name" value="" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                                </td>
                            </tr>
                            <tr>
                                <td class="longlivecenter">
                                    Last Name
                                </td>
                                <td>
                                    <input type="text" name="lastName" id="lastName" value="" size="30" data-maxlength="30" data-type="CHAR" class="textfield" >
                                </td>
                            </tr>
                            <tr>
                                <td class="longlivecenter">
                                    Avatar
                                </td>
                                <td>
                                    <input type="file" name="avatar" id="avatar">
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr class="justify-content-center">
                                <th colspan="2" class="tblFooters justify-content-center">
                                    <input class="btn btn-primary" type="submit" value="Go">
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
