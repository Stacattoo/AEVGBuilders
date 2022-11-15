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
    <link rel="stylesheet" href="message.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- <script src="https://example.com/fontawesome/v6.2.0/js/all.js" data-auto-replace-svg></script> -->
    <script src="message.js"></script>
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
                <li><a href="../projects/project.php" class="nav-link px-2 link-dark">Projects</a></li>
                <li><a href="../materials/materials.php" class="nav-link px-2 link-dark">Materials</a></li>

            </ul>


            <div class="col-md-3 text-end">

                <!-- Checking if the session is set -->

                <?php if (!isset($_SESSION['id'])) { ?>

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
                                <li><a class="dropdown-item" href="../message/message.php">Message</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../../logout/logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <?php if (!$dbh->getSched($_SESSION['id']) >= '1') { ?>
                            <div>
                                <a href="../contactUs/contactUs.php" class="nav-link mt-1 mx-3 px-2 link-dark">Contact Us</a>
                            </div>
                        <?php } ?>
                    </div>

                <?php } ?>

            </div>
        </header>
    </div>
    <div class="container-fluid mx-auto mt-3 text-center" style="max-width: 800px;">
        <form id="messageForm">
            <!-- <h4 id="client-name"></h4> -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">AEVGBuilders</h5>
                    </div>
                    <div class="modal-body" style="height: 390px; overflow-y:scroll; overflow-x:hidden;">
                        <div class="position-absolute bottom-0 start-0 mx-3 mb-3" id="messageRetrieve">
                            <div>
                                <small>client</small>
                                <div class="text-bg-secondary p-2 rounded-4">hello</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                    <textarea class="form-control" aria-label="With textarea" id="contentID" name="clientMessage"></textarea>
                <button type="submit" class="btn btn-primary px-5 mt-3">Send</button>
                    </div>
                </div>
            </div>
            <!-- <div class="d-flex mt-4">
                <textarea class="form-control" aria-label="With textarea" id="contentID" name="clientMessage"></textarea>
                <button type="submit" class="btn btn-primary px-5 mt-3">Send</button>
            </div> -->

        </form>
    </div>
</body>

</html>