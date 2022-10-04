<?php

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $subject = "Forgot Password";
    include("../include/phpMailer.php");
    include("../include/dbh.inc.php");
    $dbh = new dbHandler();

    if ($dbh->isEmailExist($email)) {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz!@#$%&*';
        $newPass = substr(str_shuffle($data), 0, 8);
        $emailBody = "Your new password is: <b>$newPass</b>";
        
        $mail = new Mail($email, $subject, $emailBody);
        if($mail) {
            echo "Registered";
            $dbh->updatePassword($email, $newPass);
        }
    } else {
        echo "Not Registered";
    }
}
