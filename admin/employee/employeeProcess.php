<?php
include('../include/dbh.admin.php');
include("../include/phpMailer.php");
$dbh = new dbHandler();

if (isset($_POST['displayUsers'])) {
    echo json_encode((array)$dbh->getAllUserData());
}

if (isset($_POST['REMOVE_EMPLOYEE_REQ'])) {
    echo $dbh->updateSpecificInfo($_POST['REMOVE_EMPLOYEE_REQ'], 'status', 'deleted', 'employee');
}

if (isset($_POST['editUser'])) {
    echo json_encode((array)$dbh->getAllInfoByID($_POST['editUser']));
}

if (isset($_POST['ADD_EMPLOYEE_REQ'])) {
    $email = $_POST['add-email'];
    $username = explode("@", $email)[0];
    $password = generateRandomPassword();
    $body = " <table><tbody>";
    $body .= "<tr><td style='background-color: #030303; color: white; padding: 10px 10px; font-size: 20px; font-weight: 600;'>AEVG Builders</td></tr>";
    $body .= "<tr><td>";
    $body .= "<h3>Good day!</h3>";
    $body .= "<p style='font-size: 20px;'>We have successfully created your account</p>";
    $body .= "<p>You may now sign in to the AEVG Builders Employee System using the information below :</p>";
    $body .= "</td></tr>";
    $body .= "<tr><td>";
    $body .= "<div>username: $username</div>";
    $body .= "<div>password: <b>$password</b></div>";
    $body .= "</td></tr>";
    $body .= "<tr><td><p>*Note:Please check your spelling and case.</p></td></tr>";
    $body .= "</tbody></table>";
    $mail = new Mail($email, "AEVG Builders: Employee Account Creation", $body);
    $details = (object) [
        'firstName' => $_POST['add-firstName'],
        'middleName' => $_POST['add-middleName'],
        'lastName' => $_POST['add-lastName'],
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'contactNo' => $_POST['add-contactNo'],
        'houseNo' => $_POST['add-houseNo'],
        'street' => $_POST['add-street'],
        'barangay' => $_POST['add-barangay'],
        'municipality' => $_POST['add-municipality'],
        'province' => $_POST['add-province'],
    ];
    echo json_encode((array)$dbh->addNewEmployee($details));
}

if (isset($_POST['EDIT_EMPLOYEE_REQ'])) {
    $details = (object) [
        'id' => $_POST['edit-id'],
        'firstName' => $_POST['edit-firstName'],
        'middleName' => $_POST['edit-middleName'],
        'lastName' => $_POST['edit-lastName'],
        'email' => $_POST['edit-email'],
        'contactNo' => $_POST['edit-contactNo'],
        'houseNo' => $_POST['edit-houseNo'],
        'street' => $_POST['edit-street'],
        'barangay' => $_POST['edit-barangay'],
        'municipality' => $_POST['edit-municipality'],
        'province' => $_POST['edit-province'],
    ];
    echo json_encode((array)$dbh->editEmployee($details));
}

function generateRandomPassword(): string
{
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz!@#$%&*';
    return substr(str_shuffle($data), 0, 8);
}

if (isset($_POST['updateStatus'])) {
    echo json_encode((array)$dbh->updateClientStatus($_POST['updateStatus'], $_POST['employeeStatus'])); // employeestatus dapat
}