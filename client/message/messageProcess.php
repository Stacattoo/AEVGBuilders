<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler();

if (isset($_POST['clientMessage'])) {

    $date = date('Y-m-d H:i:s');
    $json = array(
        (object)[
            "content" => $_POST['clientMessage'],
            "dateTime" => $date,
            "sender" => "client"
        ]
    );
    $json = json_encode($json);
    if ($dbh->insertClientMessage($json, $_SESSION['id'])) {
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Profile Update Successfully.'
        ));
    }
}

if (isset($_POST['getMessage'])) {
    echo json_encode((array)$dbh->getContent($_SESSION['id'])[0]);
}
