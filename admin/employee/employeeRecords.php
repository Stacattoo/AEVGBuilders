<?php 
include('../include/dbh.admin.php');
$dbh = new dbHandler();
$userData = $dbh->getAllInfoByID($_POST['id']);
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<div class="card mb-2">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h5 class="card-subtitle text-muted align-bottom m-0"><?php echo $userData->email; ?></h5>
            <div class="dropdown m-0">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="edit" data-bs-toggle="modal" href="#editModal" data-id="<?php echo $userData->id; ?>">Edit</a></li>
                    <li><a class="dropdown-item" id="delete" data-bs-toggle="modal" href="#deleteModal" data-id="<?php echo $userData->id; ?>">Delete</a></li>
                </ul>
            </div>
        </div>
        <h1><?php echo $userData->fullName; ?></h1>
        <div>Fullname: <span class="text-primary fw-bolder"><?php echo $userData->fullname; ?></span></div>
        <div>Email: <a href="mailto:<?php echo $userData->email; ?>" class="fw-bolder"><?php echo $userData->email; ?></a></div>
        <div>Address: <span class="fw-bolder"><?php echo $userData->contact; ?></span></div>
    </div>
</div>