<?php
include('../include/dbh.admin.php');
$dbh = new dbHandler;

$trimmed_array = '';

if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
    $imageCount = count($_FILES['image']['name']);
    $paths = "";
    for ($i = 0; $i < $imageCount; $i++) {
        $file_name = $_FILES['image']['name'][$i];
        $file_tmp = $_FILES["image"]["tmp_name"][$i];
        $img_path = "image/" . basename($file_name);
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
        'category' => $_POST['category'],
        'image' => $trimmed_array,
        'description' => $_POST['description'],
    ];
}

if (isset($_POST["getPendingProjects"])) {
    echo json_encode((array)$dbh->getAdminPendingProjects());
}