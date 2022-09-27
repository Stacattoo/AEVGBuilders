<?php
include_once("../include/dbh.inc.php");
$dbh = new dbHandler;
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../include/style.css">
    <link rel="stylesheet" href="profile.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://example.com/fontawesome/v6.2.0/js/all.js" data-auto-replace-svg></script>
    <script src="profile.js"></script>
</head>

<body>
    <div class="container-fluid">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="../../images/aevg.png" class="" height="45">
            </a>



            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">



                <li><a href="../home/home.php" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="../aboutUs/aboutUs.php" class="nav-link px-2 link-dark">About Us</a></li>
                <li><a href="../services/services.php" class="nav-link px-2 link-dark">Services</a></li>
                <li><a href="../projects/project.php" class="nav-link px-2 link-dark">Projects</a></li>
                <li><a href="../materials/materials.php" class="nav-link px-2 link-dark">Materials</a></li>

            </ul>


            <div class="col-md-3 text-end">

                <!-- Checking if the session is set -->

                <?php if (!isset($_SESSION['id'])) { ?>

                    <a href="../register/register.php" class="btn btn-dark">Sign-up</a>
                    <a href="../login/login.php" class="btn btn-outline-dark me-2">Login</a>

                <?php } else { ?>

                    <div class="dropdown">

                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $dbh->getFullname($_SESSION['id']); ?>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-dark">

                            <li><a class="dropdown-item active" href="../profile/profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="../message/message.php">Message</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../logout/logout.php">Logout</a></li>

                        </ul>
                    </div>

                <?php } ?>

            </div>
        </header>
    </div>

    <div class="form-container p-5 mt-3">

        <div class="row">
            <div class="col-9 fw-bold fs-3">
                Profile
            </div>

            <form id="profileForm">
                <div class="row">
                    <div class="col-4">

                        <div id="imgForm" class="text-center mt-5">
                            <img id="profileImg" src="<?php echo $dbh->getValueByID('image', $_SESSION['id']); ?>" style="max-height: 150px;">
                            <input type="file" id="imgBtn" class="btn btn-dark mt-2 form-control" name="image">
                            <input type="hidden" name="file_path" value="<?php echo $dbh->getValueByID('image', $_SESSION['id']); ?>">
                        </div>

                    </div>
                    <div class="col-6">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" type="button" aria-current="page" id="profileInfo">Edit Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" type="button" id="passBtn">Change Password</a>
                            </li>
                        </ul>

                        <div class="d-flex justify-content-evenly">
                            <input type="text" class="form-control mt-5" name="firstName" value="<?php echo $dbh->getValueByID('firstName', $_SESSION['id']); ?>">
                            <input type="text" class="form-control mt-5" name="middleName" value="<?php echo $dbh->getValueByID('middleName', $_SESSION['id']); ?>" placeholder="Middle Name (optional)">
                            <input type="text" class="form-control mt-5" name="lastName" value="<?php echo $dbh->getValueByID('lastName', $_SESSION['id']); ?>">
                        </div>

                        <div class="d-flex justify-content-evenly">
                            <input type="email" class="form-control mt-2" name="email" value="<?php echo $dbh->getValueByID('email', $_SESSION['id']); ?>">
                            <input type="text" class="form-control mt-2" name="contact_no" value="<?php echo $dbh->getValueByID('contact_no', $_SESSION['id']); ?>">
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <input type="text" class="form-control mt-2" name="house_no" value="<?php echo $dbh->getValueByID('house_no', $_SESSION['id']); ?>" placeholder="House No. (optional)">
                            <input type="text" class="form-control mt-2" name="street" value="<?php echo $dbh->getValueByID('street', $_SESSION['id']); ?>" placeholder="Street (optional)">
                            <input type="text" class="form-control mt-2" name="barangay" value="<?php echo $dbh->getValueByID('barangay', $_SESSION['id']); ?>">
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <input type="text" class="form-control mt-2" name="municipality" value="<?php echo $dbh->getValueByID('municipality', $_SESSION['id']); ?>">
                            <input type="text" class="form-control mt-2" name="province" value="<?php echo $dbh->getValueByID('province', $_SESSION['id']); ?>">
                        </div>
                        <div class="alert alert-danger mt-3" role="alert" id="alertError">
                        </div>
                        <div class="alert alert-success mt-3" role="alert" id="alertSuccess">
                        </div>
                        <button type="submit" name="upload" class="btn btn-primary form-control mt-3">Save Changes</button>
                    </div>
            </form>

            <form id="changePassForm" class="row g-3 p-3">

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

                <div class="alert alert-danger mt-3 form-control" role="alert" id="errorPass">
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary mt-3 mb-5" id="savepass" name="savepass">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    </div>

</body>

<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">

        </ul>
        <p class="text-center text-muted">&copy; 2020 AEVG BUILDERS</p>

    </footer>

</html>