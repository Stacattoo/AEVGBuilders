<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();

$trimmed_array1 = '';
$trimmed_array2 = '';
if (isset($_FILES['filesEmployee'])) {
    if ($_FILES['filesEmployee']['size'][0] != 0) {
        $file_type = '';
        $imageType = array('gif', 'png', 'jpg', 'jpeg');
        $docType =  array('pdf', 'xlsx', 'doc', 'docx', 'txt');
        $imageCount = count($_FILES['filesEmployee']['name']);
        $paths = "";
        $path2 = "";
        for ($i = 0; $i < $imageCount; $i++) {
            $file_name = $_FILES['filesEmployee']['name'][$i];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_tmp = $_FILES["filesEmployee"]["tmp_name"][$i];
            $img_path = "../../clientEmployeeFiles/" . basename($file_name);
            $paths .= $img_path . "&&^%$%$";
            if (in_array($ext, $imageType)) {
                $file_type .= 'image';
            }
            if(in_array($ext, $docType)){
                $file_type .= 'file';
            }
            if (!move_uploaded_file($file_tmp, $img_path)) {
                $paths = "";
            }
        }


        $trimmed_array1 = trim($paths, "&&^%$%$");
        $clientID = $_POST['clientID'];
        $date = date('Y-m-d H:i:s');

        $jsonFiles = array(
            (object)[
                "content" => $trimmed_array1,
                "dateTime" => $date,
                "sender" => "employee",
                "type" => $file_type
            ]
        );

        $jsonFiles = json_encode($jsonFiles);
        // var_dump($jsonFiles);
        if ($dbh->insertEmployeeFiles($jsonFiles, $clientID, $_SESSION['id'])) {
            echo json_encode(array(
                "status" => 'success',
                "msg" => 'Profile Update FILES Successfully.'
            ));
        }
    }
}
$img_path = '';
if (isset($_FILES['costEstimate'])) {
    if ($_FILES['costEstimate']['size'] != 0) {


        $img_path = "../../clientEmployeeFiles/" . basename($_FILES['costEstimate']['name']);

        move_uploaded_file($_FILES['costEstimate']['tmp_name'], $img_path);


        $clientID = $_POST['clientID'];
        $date = date('Y-m-d H:i:s');

        $jsonCostEstimate = array(
            (object)[
                "content" => $img_path,
                "dateTime" => $date,
                "sender" => "employee",
                "type" => "costEstimate"
            ]
        );

        $jsonCostEstimate = json_encode($jsonCostEstimate);

        if ($dbh->insertEmployeeCostEstimate($jsonCostEstimate, $clientID, $_SESSION['id'])) {
            echo json_encode(array(
                "status" => 'success',
                "msg" => 'Profile Update COST ESTIMATE Successfully.'
            ));
        }
    }
}

if (isset($_POST['employeeMessage']) && $_POST['employeeMessage'] != '') {
    $clientID = $_POST['clientID'];
    $date = date('Y-m-d H:i:s');
    $jsonContent = array(
        (object)[
            "content" => $_POST['employeeMessage'],
            "dateTime" => $date,
            "sender" => "employee",
            "type" => "text"
        ]
    );
    // }
    $jsonContent = json_encode($jsonContent);
    // echo"textmsg";
    if ($dbh->insertEmployeeMessage($jsonContent, $clientID, $_SESSION['id'])) {
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Profile Update Successfully.'
        ));
    }
}

if (isset($_POST['getMessage'])) {
    $client_id = $_POST['id'];
    echo json_encode((array)$dbh->getContent($client_id, $_SESSION['id'])[0]);
}
