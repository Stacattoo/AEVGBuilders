<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler;

    if ($dbh->checkIfSomeAlrExist($_POST['title'], 'projects', 'title')) {

        echo json_encode(array(
            "status" => 'error',
            'msg' => "Project Already Exist!"
        ));
    } else {
        // echo json_encode(array(
        //     "status" => 'success',
        //     'msg' => "Product Dont Exist!"
        // ));
        $img_path = "image/" . basename($_FILES['image']['name']);
        $info = (object) [
            'title' => $_POST['title'],
            'category' => $_POST['category'],
            'image' => $img_path,
            'description' => $_POST['description'],

        ];

        if (move_uploaded_file($_FILES['image']['tmp_name'], $img_path)) {
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
        
    }


