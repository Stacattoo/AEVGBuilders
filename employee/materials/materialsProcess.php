<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler;

    if ($dbh->checkIfSomeAlrExist($_POST['code'], 'material', 'code')) {

        echo json_encode(array(
            "status" => 'error',
            'msg' => "Product Already Exist!"
        ));
    } else {
        // echo json_encode(array(
        //     "status" => 'success',
        //     'msg' => "Product Dont Exist!"
        // ));
        $img_path = "../image/" . basename($_FILES['image']['name']);
        $info = (object) [
            'code' => $_POST['code'],
            'name' => $_POST['name'],
            'image' => $img_path,
            'category' => $_POST['category'],
            'description' => $_POST['description'],
            'stock' => $_POST['stock']

        ];

        if (move_uploaded_file($_FILES['image']['tmp_name'], $img_path)) {
            if ($dbh->uploadProduct($info)) {
                echo json_encode(array(
                    "status" => 'success',
                    "msg" => 'Product Successfully Uploaded.'
                ));
            }
        } else {
            echo json_encode(array(
                "status" => 'error',
                "msg" => 'There was a problem Uploading, Please try again.'
            ));
        }
        
    }


