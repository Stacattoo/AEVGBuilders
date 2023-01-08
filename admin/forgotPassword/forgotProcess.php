<?php

if (isset($_POST["fpEmail"])) {
    $email = $_POST["fpEmail"];
    $subject = "Forgot Password";
    include("../include/phpMailer.php");
    include("../include/dbh.admin.php");
    $dbh = new dbHandler();

    if ($dbh->checkIfEmailExist($email)) {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz!@#$%&*';
        $newPass = substr(str_shuffle($data), 0, 8);

        $emailBody = "Your new password is: <b>$newPass</b>";
        
        $mail = new Mail($email, $subject, $emailBody);
        if($mail) {
            echo json_encode(array(
                "status" => 'success',
                'msg' => "A new password was successfully sent on your email."
            ));
            $dbh->updatePassword($email, $newPass);
        }
        
    } else {
        echo json_encode(array(
            "status" => 'error',
            'msg' => "Email not registered"
        ));
    }
}
