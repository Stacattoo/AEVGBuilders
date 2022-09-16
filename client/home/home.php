<?php
include_once("../include/dbh.inc.php");
$dbh = new dbHandler;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../include/style.css">
    <link rel="stylesheet" href="home.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- <script src="login.js"></script> -->
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
                <li><a href="../Projects/project.php" class="nav-link px-2 link-dark">Projects</a></li>
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

</body>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 fw-normal">Lorem ipsum </h1>
        <p class="lead fw-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, quas ipsam maxime at quaerat, ratione eum quod vero enim incidunt nam maiores dolore ipsum officiis magnam facere natus inventore eos!</p>
        <a class="btn btn-outline-secondary" href="#">Coming soon</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>



<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">

        </ul>
        <p class="text-center text-muted">&copy; 2020 AEVG BUILDERS</p>

    </footer>

</html>