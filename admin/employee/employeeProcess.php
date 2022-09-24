<?php 
include('../include/dbh.admin.php');
$dbh = new dbHandler();

if (isset($_POST['displayUsers'])){
    echo json_encode((array)$dbh->getAllUserData());
}

if (isset($_POST['username'])){
    $info = (object)[
        'id' => $row['id'],
        'firstName' => $row['firstName'],
        'lastName' => $row['lastName'],
        'username' => $row['username'],
        'contactNo' => $row['contactNo'],
        'email' => $row['email'],
        'password' => $row['password'],
        'houseNo' => $row['houseNo'],
        'street' => $row['street'],
        'baranggay' => $row['baranggay'],
        'municipality' => $row['municipality'],
        'province' => $row['province'],
    ];
    if (!$dbh->isUserAccountExist($info->id, $info->username, $info->email)){
        echo $dbh->updateUserInfo($info, $_POST['id']);
    }
}

if (isset($_POST['deleteUser'])){
    echo $dbh->updateSpecificInfo($_POST['deleteUser'], 'status', 'deleted', 'userdata');
}

if (isset($_POST['editUser'])){
    echo json_encode((array)$dbh->getAllInfoByID($_POST['editUser']));
}