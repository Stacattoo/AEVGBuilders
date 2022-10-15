<?php
include("../include/dbh.employee.php");
$dbh = new dbHandler;
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<link rel="stylesheet" type="text/css" href="../profile/profile.css">
<script src="../profile/profile.js"></script>


<div class="container-fluid">
    <div class="form-container p-5 mt-3">
        <div class="row">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" type="button" aria-current="page" id="profileInfo">Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" id="passBtn">Change Password</a>
                </li>
            </ul>

            <form id="profileForm">
                <div class="row mt-3">
                    <div class="col-4">

                        <div id="imgForm" class="text-center mt-5">
                            <img id="profileImg" src="../profile/<?php echo $dbh->getValueByProfileID('profile_picture', $_SESSION['id']); ?>" style="max-height: 150px;">
                            <!-- //C:\xampp\htdocs\AEVGBuilders\employee\profile\image -->
                            <input type="file" id="imgBtn" class="btn btn-dark mt-2 form-control" name="image">
                            <input type="hidden" name="file_path" value="../profile/<?php echo $dbh->getValueByProfileID('profile_picture', $_SESSION['id']); ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-evenly">
                            <input type="text" class="form-control mt-5" name="firstName" value="<?php echo $dbh->getValueByProfileID('firstName', $_SESSION['id']); ?>">
                            <input type="text" class="form-control mt-5" name="middleName" value="<?php echo $dbh->getValueByProfileID('middleName', $_SESSION['id']); ?>" placeholder="Middle Name (optional)">
                            <input type="text" class="form-control mt-5" name="lastName" value="<?php echo $dbh->getValueByProfileID('lastName', $_SESSION['id']); ?>">
                        </div>
                        <div class="d-flex justify-content-evenly">
                        <input type="text" class="form-control mt-2" name="username" value="<?php echo $dbh->getValueByProfileID('username', $_SESSION['id']); ?>">
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <input type="email" class="form-control mt-2" name="email" value="<?php echo $dbh->getValueByProfileID('email', $_SESSION['id']); ?>">
                            <input type="text" class="form-control mt-2" name="contactNo" value="<?php echo $dbh->getValueByProfileID('contactNo', $_SESSION['id']); ?>">
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <input type="text" class="form-control mt-2" name="houseNo" value="<?php echo $dbh->getValueByProfileID('houseNo', $_SESSION['id']); ?>" placeholder="House No. (optional)">
                            <input type="text" class="form-control mt-2" name="street" value="<?php echo $dbh->getValueByProfileID('street', $_SESSION['id']); ?>" placeholder="Street (optional)">
                            <input type="text" class="form-control mt-2" name="barangay" value="<?php echo $dbh->getValueByProfileID('barangay', $_SESSION['id']); ?>">
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <input type="text" class="form-control mt-2" name="municipality" value="<?php echo $dbh->getValueByProfileID('municipality', $_SESSION['id']); ?>">
                            <input type="text" class="form-control mt-2" name="province" value="<?php echo $dbh->getValueByProfileID('province', $_SESSION['id']); ?>">
                        </div>
                        <div class="alert alert-danger mt-3" role="alert" id="alertError">
                        </div>
                        <div class="alert alert-success mt-3" role="alert" id="alertSuccess">
                        </div>
                        <button type="submit" name="upload" class="btn btn-primary form-control mt-3">Save Changes</button>
                    </div>
                </div>
            </form>
            <form id="changePassForm" class="row g-3 p-3">
                <div class="row mt-3">
                    <div class="col-4">
                    </div>
                    <div class="col-6">
                        <div class="col-12 fw-bold">
                            <label for="inputAddress" class="form-label">Current Password:</label>
                            <input type="password" class="password form-control" id="inputAddressOld" name="oldPass" required>
                        </div>
                        <div class="col-12 fw-bold">
                            <label for="inputAddress" class="form-label">New Password:</label>
                            <input type="password" class="password form-control" id="inputAddressNew" name="newPass" required>
                        </div>
                        <div class="col-12 fw-bold">
                            <label for="inputAddress" class="form-label">Confirm Password:</label>
                            <input type="password" class="password form-control" id="inputAddressConfirm" name="confirmPass" required>
                        </div>
                        <div class="alert alert-danger mt-3 form-control" role="alert" id="errorPass"></div>
                        <button type="submit" name="passUpBtn" class="btn btn-primary form-control mt-3">Update Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>