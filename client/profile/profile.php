<?php
include_once("../include/dbh.inc.php");
$dbh = new dbHandler;
$userData = $dbh->getAllClientStatusByID($_SESSION['id']);
$pendingUserData = $dbh->PgetAllClientInfoByID($_SESSION['id']);
$getSched = $dbh->getSched($_SESSION['id']);

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../contactUs/contactUs.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="profile.js"></script>
</head>

<body>
    <div class="container-fluid">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="../../images/aevg.png" class="img-logo" height="45">
            </a>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../home/home.php" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="../aboutUs/aboutUs.php" class="nav-link px-2 link-dark">About Us</a></li>
                <li><a href="../projects/project.php" class="nav-link px-2 link-dark">Projects</a></li>
                <!-- <li><a href="../materials/materials.php" class="nav-link px-2 link-dark">Materials</a></li> -->
                <?php if (isset($_SESSION['id']) && !$dbh->getSched($_SESSION['id']) >= '1') { ?>
                    <li><a href="../contactUs/contactUs.php" class="nav-link px-2 link-dark">Appointment</a></li>
                <?php }  ?>
            </ul>


            <div class="col-md-3 text-end">

                <!-- Checking if the session is set -->

                <?php if (!isset($_SESSION['id']) && !$dbh->getSched($_SESSION['id']) >= '1') { ?>

                    <a href="../register/register.php" class="btn btn-dark">Sign-up</a>
                    <a href="../login/login.php" class="btn btn-outline-dark me-2">Login</a>

                <?php } else { ?>

                    <div class="d-flex flex-row-reverse">

                        <div class="dropdown me-5">
                            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../profile/<?php echo $dbh->getValueByID('image', $_SESSION['id']); ?>" alt="" width="32" height="32" class="rounded-circle me-2">
                                <strong class="text-capitalize"><?php echo $dbh->getFullname($_SESSION['id']); ?></strong>
                            </a>
                            <ul class="dropdown-menu text-small shadow">
                                <li><a class="dropdown-item active" href="../profile/profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="../../logout/logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <?php if (!$dbh->getSched($_SESSION['id']) >= '1') { ?>
                            <div>

                            </div>
                        <?php } ?>
                    </div>

                <?php } ?>

            </div>
        </header>
    </div>
    <div class="container">
        <div class="row align-items-md-stretch">

            <div class="col-md-6">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <h2 class="text-capitalize"><?php echo $dbh->getFullname($_SESSION['id']); ?></h2>
                    <!--  -->
                    <p>Email Address: <?php echo $dbh->getValueByID('email', $_SESSION['id']); ?></p>
                    <p>Contact Number: <?php echo $dbh->getValueByID('contact_no', $_SESSION['id']); ?></p>
                    <p class="text-capitalize">Home Address: <?php echo $dbh->getAddress($_SESSION['id']); ?></p>
                    <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Edit Profile</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <div id="viewAppModal">
                        <!-- IF there is an appointment -->
                        <h2>Appointment Schedule</h2>
                        <p>The client wants to set an appointment. </p>
                        <button class="btn btn-outline-secondary" id="viewModBtn" type="button" data-bs-toggle="modal" href="#exampleModal1">View Appointment Details</button>
                        <button class="btn btn-danger" type="button" id="cancelBtnModal" name="cancelBtn" data-bs-toggle="modal" href="#exampleModal2">Cancel Appointment</button>
                    </div>
                    <div id="schedAppProfile">
                        <!-- if there is no appointment -->
                        <h2>Schedule an Appointment.</h2>
                        <p>You can now schedule an appointment for your personal inquires.</p>
                        <p class="lead mb-0"><a type="button" class="btn btn-warning" href="../contactUs/contactUs.php">
                                Schedule an Appointment.
                            </a></p>
                    </div>
                    <div id="haveASchedule">
                        <!-- if there is no appointment -->
                        <h2>You already have an appointment!</h2>
                        <p>Kindly check your messages, and view your submitted appointment information.</p>
                        <div class="alert alert-info text-center">
                        <h5>Date and Time of Schedule:</h5>
                        <p id="displayAppDate" class="fs-4 fw-4 ">
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0 py-4"> Are you sure you want to cancel?</h5>
                </div>

                <div class="modal-footer flex-nowrap p-0">
                    <a href="deleteSched.php" type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end"><strong>Yes</strong></a>
                    <a type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <!-- APPOINTMENT VIEW MODAL -->

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 mx-3" id="exampleModalLabel1">Appointment Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <div class="row g-3">
                        <div class="col">
                            <h4><b>Name: </b></h4>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="name_id" readonly>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h5><b>Email Address: </b></h5>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="email_id" readonly>

                        </div>
                        <div class="col-sm-6">
                            <h5><b>Contact Number: </b></h5>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="contact_id" readonly>

                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h5><b>Project Type: </b></h5>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="projType_id" readonly>


                        </div>
                        <div class="col-sm-6">
                            <h5><b>Nature of Business: </b></h5>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="business_id" readonly>

                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-9">
                            <h5><b>Project Location: </b></h5>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="projLoc_id" readonly>

                        </div>
                        <div class="col-sm-3">
                            <h5><b>Lot Area: </b></h5>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="lotArea_id" readonly>

                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h5><b>Number of Building Storey: </b></h5>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="numStorey_id" readonly>


                        </div>
                        <div class="col-sm-6">
                            <h5><b>Target Construction Date: </b></h5>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="targetCons_id" readonly>


                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h5><b>Meeting Type: </b></h5>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="meetType_id" readonly>

                        </div>
                        <div class="col-sm-6">
                            <h5><b>Meeting Location:</b></h5>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="meetLoc_id" readonly>

                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h5><b>Meeting Date:</b></h5>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="meetDate_id" readonly>

                        </div>
                        <div class="col-sm-6">
                            <h5><b>Meeting Time:</b></h5>
                            <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="meetTime_id" readonly>

                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <!-- <button type="button" class="btn btn-success" id="viewBtnSched" data-id="">View Appointment Details</button> -->
                    <button type="button" class="btn btn-success" id="editBtnSched" data-id="">Edit Appointment Details</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->



    <div class="container mt-5 ">
        <h2>List of Previous Quotation</h2>
        <div class="table-responsive ">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Date & Time</th>
                        <th scope="col">File Name</th>
                    </tr>
                    <tr class="bg-light" id="hideMe">
                        <td>No Cost Estimate</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>


                <tbody>
                <tbody id="costEstiTable" class="table table-striped table-hover">

                </tbody>
            </table>
        </div>
    </div>
    
    <div class="container mt-3">
        <hr>
        <h2>On site portfolio</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="portfolioOnsite">
        </div>
        <div id="hidePortDiv" class="mt-5">
            <div class="card mb-2  rounded-3">
                <div class="card-body rounded-3 " style="background-color:#f8f9fa;">
                    <div class="d-flex justify-content-between">
                        <div class="mb-2 mx-3 rounded-4" style="height: 30px; width: 400px; background-color:#e9ecef;"></div>
                        <div class="mb-2 mx-3 " style="height: 40px; width: 200px; background-color:#e9ecef;"></div>
                    </div>
                    <hr>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mx-5">
                        <div class="col">
                            <div class="mb-2  rounded-4" style="height: 300px; width: 250px; background-color:#e9ecef;"></div>
                        </div>
                        <div class="col">
                            <div class="mb-2  rounded-4" style="height: 300px; width: 250px; background-color:#e9ecef;"></div>
                        </div>
                        <div class="col">
                            <div class="mb-2 rounded-4" style="height: 300px; width: 250px; background-color:#e9ecef;"></div>
                        </div>
                        <div class="col">
                            <div class="mb-2  rounded-4" style="height: 300px; width: 250px; background-color:#e9ecef;"></div>
                        </div>
                        <div class="col">
                            <div class="mb-2  rounded-4" style="height: 300px; width: 250px; background-color:#e9ecef;"></div>
                        </div>
                        <div class="col">
                            <div class="mb-2 rounded-4" style="height: 300px; width: 250px; background-color:#e9ecef;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- MODAL PORTFOLIO ONSITE IMAGESS -->
    <div class="modal fade" id="openPortfolioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-5" id="portfolioContent">

                </div>
            </div>
        </div>
    </div>


    </div>
    <!-- modal for edit profile -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" type="button" aria-current="page" id="profileInfo">Edit Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" type="button" id="passBtn">Change Password</a>
                        </li>
                    </ul>

                    <form id="profileForm">
                        <div class="row mt-3">
                            <div class="col-4">

                                <div id="imgForm" class="text-center mt-5">
                                    <img id="profileImg" src="<?php echo $dbh->getValueByID('image', $_SESSION['id']); ?>" style="max-height: 150px;">
                                    <input type="file" id="imgBtn" class="btn btn-dark mt-2 form-control" name="image">
                                    <input type="hidden" name="file_path" value="<?php echo $dbh->getValueByID('image', $_SESSION['id']); ?>">
                                </div>

                            </div>
                            <div class="col-8">
                                <div class="row g-2">
                                    <div class="col">
                                        <div class="mb-3 ">
                                            <label for="lastName" class="form-label">*Last Name</label>
                                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $dbh->getValueByID('lastName', $_SESSION['id']); ?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3 ">
                                            <label for="firstName" class="form-label">*First Name</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $dbh->getValueByID('firstName', $_SESSION['id']); ?>">
                                        </div>


                                    </div>
                                    <div class="col">
                                        <div class="mb-3 ">
                                            <label for="middleName" class="form-label">Middle Initials </label>
                                            <input type="text" class="form-control" id="middleName" name="middleName" value="<?php echo $dbh->getValueByID('middleName', $_SESSION['id']); ?>" placeholder="(optional)">
                                        </div>
                                    </div>

                                </div>




                                <div class="row g-2">
                                    <div class="col">
                                        <div class="mb-3 ">
                                            <label for="Email" class="form-label">*Email Address </label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $dbh->getValueByID('email', $_SESSION['id']); ?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3 ">
                                            <label for="ContactNumber" class="form-label">*Contact Number </label>
                                            <input type="text" class="form-control " name="contact_no" value="<?php echo $dbh->getValueByID('contact_no', $_SESSION['id']); ?>">
                                        </div>
                                    </div>
                                </div>



                                <label for="HomeAddress" class="form-label">*Home Address </label>
                                <div class="row g-2">
                                    <div class="col">
                                        <div class="mb-3 ">
                                            <input type="text" class="form-control " name="house_no" value="<?php echo $dbh->getValueByID('house_no', $_SESSION['id']); ?>" placeholder="House No." required>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="mb-3 ">
                                            <input type="text" class="form-control " name="street" value="<?php echo $dbh->getValueByID('street', $_SESSION['id']); ?>" placeholder="Street Name" required>

                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3 ">
                                            <input type="text" class="form-control " name="barangay" value="<?php echo $dbh->getValueByID('barangay', $_SESSION['id']); ?>" placeholder="Barangay" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col">
                                        <div class="mb-3 ">
                                            <input type="text" class="form-control " name="municipality" value="<?php echo $dbh->getValueByID('municipality', $_SESSION['id']); ?>" placeholder="Municipality" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3 ">
                                            <input type="text" class="form-control " name="province" value="<?php echo $dbh->getValueByID('province', $_SESSION['id']); ?>" placeholder="Province" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-danger mt-3" role="alert" id="alertError">
                                </div>
                                <div class="alert alert-success mt-3" role="alert" id="alertSuccess">
                                </div>
                                <button type="submit" name="upload" class="btn btn-primary form-control mt-3">Save Changes</button>
                            </div>
                        </div>
                </div>
                </form>

                <form id="changePassForm" class="row g-3 p-3  ms-auto me-auto" style="width: 400px;">

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

                    <div class="mt-2 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mt-3 mb-5 float-right" id="savepass" name="savepass">Save changes</button>
                    </div>


                </form>
            </div>

        </div>

    </div>

    <div class="fixed-bottom  d-flex justify-content-end m-3 ">

        <div>
            <?php if ($userData->status != '' && $pendingUserData->status != '') {
            ?>
                <div class=" ">

                    <button type="button" class="btn text-black  p-3 rounded-circle " id="msg" style="background-color: #fccc5d">
                        <i class="fal fa-comment-alt-lines fs-2"></i>
                    </button>
                </div>
            <?php
            } else {
            ?>
                <div class=" ">
                    <button type="button" class="btn text-black  p-3 rounded-circle " id="msg" style="background-color: #fccc5d" disabled>
                        <i class="fal fa-comment-alt-lines fs-2"></i>
                    </button>
                </div>

            <?php } ?>
            <div class="mt-2">
                <button type="button" class="btn text-black p-3 rounded-circle " id="fb" style="background-color: #fccc5d">
                    <i class="fal fa-bullhorn fs-3"></i>
                </button>
            </div>

        </div>
    </div>


    <div class="container">

        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">

            </ul>
            <p class="text-center text-muted">&copy; 2020 AEVG BUILDERS</p>

        </footer>
    </div>
</body>

</html>
