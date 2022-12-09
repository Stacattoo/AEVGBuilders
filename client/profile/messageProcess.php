<?php
include_once('../include/dbh.inc.php');
$dbh = new dbHandler();
$trimmed_array1 = '';

if (isset($_POST['clientMessage']) && $_POST['clientMessage'] != '') {

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
    // var_dump("kahit ano");
}
if (isset($_FILES['filesEmployee'])) {
    if ($_FILES['filesEmployee']['size'][0] != 0) {
        $imageCount = count($_FILES['filesEmployee']['name']);
        $paths = "";


        for ($i = 0; $i < $imageCount; $i++) {
            $file_name = $_FILES['filesEmployee']['name'][$i];
            $file_tmp = $_FILES["filesEmployee"]["tmp_name"][$i];
            $img_path = "../../clientEmployeeFiles/" . basename($file_name);
            $paths .= $img_path . ",";
            if (!move_uploaded_file($file_tmp, $img_path)) {
                $paths = "";
            }
        }

        $trimmed_array1 = trim($paths, ",");

        // $clientID = $_POST['clientID'];
        $date = date('Y-m-d H:i:s');

        $jsonFiles = array(
            (object)[
                "content" => $trimmed_array1,
                "dateTime" => $date,
                "sender" => "client"
            ]
        );

        $jsonFiles = json_encode($jsonFiles);

        if ($dbh->insertClientFiles($jsonFiles, $_SESSION['id'])) {
            echo json_encode(array(
                "status" => 'success',
                "msg" => 'Profile Update Successfully.'
            ));
        }
    }
}
if (isset($_POST['getMessage'])) {
    echo json_encode((array)$dbh->getContent($_SESSION['id'])[0]);
}
