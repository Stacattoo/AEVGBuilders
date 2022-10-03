<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler;

// if ($dbh->checkIfSomeAlrExist($_POST['title'], 'projects', 'title')) {

//     echo json_encode(array(
//         "status" => 'error',
//         'msg' => "Project Already Exist!"
//     ));
// } else {
// echo json_encode(array(
//     "status" => 'success',
//     'msg' => "Product Dont Exist!"
// ));

    $imageCount = count($_FILES['image']['name']);
    $paths = "";
    for($i=0; $i<$imageCount; $i++){
        $file_name = $_FILES['image']['name'][$i];
        $file_tmp = $_FILES["image"]["tmp_name"][$i];
        $img_path = "image/" . basename($file_name);
        $paths .= $img_path . ",";

    }
    $trimmed_array = trim($paths, ",");
    echo $trimmed_array;

        $info = (object) [
            'title' => $_POST['title'],
            'category' => $_POST['category'],
            'image' => $trimmed_array,
            'description' => $_POST['description'],

        ];

        if (move_uploaded_file($file_tmp, $img_path)) {
            if ($dbh->uploadProject($info)) {
                echo json_encode(array(
                    "status" => 'success',
                    "msg" => 'Project Successfully Uploaded.'
                ));
            }
        } else {
            echo json_encode(array(
                "status" => 'error',
                "msg" => 'There was a problem Uploading, Please try again.'
            ));
        }
        
    // }
