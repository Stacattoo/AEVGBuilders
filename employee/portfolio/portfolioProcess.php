<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler;

// echo "pasok portfolio";
$trimmed_array = '';

if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
    $imageCount = count($_FILES['image']['name']);
    $paths = "";

    
    for ($i = 0; $i < $imageCount; $i++) {
        $file_name = $_FILES['image']['name'][$i];
        $file_tmp = $_FILES["image"]["tmp_name"][$i];
        $img_path = "../../images/" . basename($file_name);
        $paths .= $img_path . ",";
        if (!move_uploaded_file($file_tmp, $img_path)) {
            echo json_encode(array(
                "status" => 'error',
                "msg" => 'There was a problem Uploading, Please try again.'
            ));
        }
    }
    
    $trimmed_array = trim($paths, ",");

    $info = (object) [
        'title' => $_POST['title'],
        'image' => $trimmed_array,
        'description' => $_POST['description'],
    ];
// var_dump($info);
    if ($dbh->uploadPortfolio($info, $_POST['clientID'], $_SESSION['id'])) {
        echo json_encode(array(
            "status" => 'success',
            "msg" => 'Project Successfully Uploaded.'
        ));
    }
}

if (isset($_POST["getAllProjects_req"])) {
    echo json_encode((array)$dbh->getAllPortfolio($_POST['id'], $_SESSION['id']));
}
