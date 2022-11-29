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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.3.1/swiper-bundle.min.css">
    <link rel="stylesheet" href="feedback.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.3.1/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="home.js"></script>
</head>

<body>

    <div class="container-fluid fixed-top px-0">
        <header class=" bg-light d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="../../images/aevg-nobg.png" class="" height="45">
            </a>



            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

                <li><a href="../home/home.php" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="../aboutUs/aboutUs.php" class="nav-link px-2 link-dark">About Us</a></li>
                <li><a href="../projects/project.php" class="nav-link px-2 link-dark">Projects</a></li>
                <li><a href="../materials/materials.php" class="nav-link px-2 link-dark">Materials</a></li>
                <?php if (isset($_SESSION['id']) && !$dbh->getSched($_SESSION['id']) >= '1' ) { ?>
                <li><a href="../contactUs/contactUs.php" class="nav-link px-2 link-dark">Appointment</a></li>
                <?php }  ?>
            </ul>


            <div class="col-md-3 d-flex justify-content-end">

                <!-- Checking if the session is set -->
                <?php if (!isset($_SESSION['id'])) { ?>

                    <!-- <div class=""></div> -->
                    <a href="../register/register.php" class="btn btn-dark mx-2">Sign-up</a>
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

                            </div>
                        <?php } ?>
                    </div>

                <?php } ?>

            </div>
        </header>
    </div>


    <main>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="1500">
                    <img src="../../images/e.png" class="d-block w-100 img-fluid bg-carousel vh-100">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1 class="display-4">HOUSES</h1>
                            <p><a class="btn btn-lg btn-warning" href="../projects/project.php">View Projects</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="../../images/interior.jpg" class="d-block w-100 img-fluid bg-carousel vh-100">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1 class="display-4">INTERIOR DESIGN</h1>

                            <p><a class="btn btn-lg btn-warning" href="../projects/project.php">View Projects </a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" >
                    <img src="../../images/pool.jpg" class="d-block w-100 img-fluid bg-carousel vh-100">
                    <div class="container">
                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1 class="display-4">RESORTS</h1>
                                <p><a class="btn btn-lg btn-warning" href="../projects/project.php">View Projects</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            <div class="container marketing">
                <hr>
                <div class="row d-flex align-items-center">
                    <div class="col-md-4">
                        <h2 class="featurette-heading fw-normal lh-1s">CONSULTATION</h2>
                        <p class="lead">We offer high-quality construction services to clients, and a key part of this involves providing accurate projections and project costing.</p>
                    </div>
                    <div class="col-md-8 ">
                        <img class="img-fluid" src="../../images/consultation.jpg">
                    </div>
                </div>
                <hr>
                <div class="row d-flex align-items-center">
                    <div class="col-md-8">
                        <img class="img-fluid" src="../../images/interior.jpg">
                    </div>
                    <div class="col-md-4">
                        <h2 class="fw-normal lh-1">INTERIOR DESIGN</h2>
                        <p class="lead">Planning and design of man-made spaces, a part of environmental design and closely related to architecture.</p>
                    </div>
                </div>
                <hr>
                <div class="row d-flex align-items-center">
                    <div class="col-md-4">
                        <h2 class="featurette-heading fw-normal lh-1">BUDGET ESTIMATION</h2>
                        <p class="lead"> Approximates the time and resources needed to plan and complete a project and develop and implement a viable budget.</p>
                    </div>
                    <div class="col-md-8">
                        <img class="img-fluid" src="../../images/budget.jpg">
                    </div>
                </div>
                <hr>
                <div class="row d-flex align-items-center">
                    <div class="col-md-8">
                        <img class="img-fluid" src="../../images/pm.jpg">
                    </div>
                    <div class="col-md-4">
                        <h2 class=" fw-normal lh-1">PROJECT MANAGEMENT</h2>
                        <p class="lead">Project documentation, planning, tracking, and communication—all with the goal of delivering work successfully</p>
                    </div>
                </div>
                <hr>
                <div class="row d-flex align-items-center">
                    <div class="col-md-4">
                        <h2 class="featurette-heading fw-normal lh-1">CONSTRUCTION</h2>
                        <p class="lead">Manufacture and trade based on the building, maintaining, and repairing structures.</p>
                    </div>
                    <div class="col-md-8">
                        <img class="img-fluid" src="../../images/construction.jpg">

                    </div>
                </div>
                <hr class="featurette-divider">
            </div>
        </div>

        <div class="feedback">
            <div class="wrapper">
                <header>
                    <h1 class="text-dark">FEEDBACK</h1>
                </header>
                <div class="swiper">
                    <div class="swiper-wrapper" id="feedbackContent">
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">

                </ul>
                <p class="text-center text-muted">&copy; 2017 AEVG BUILDERS</p>

            </footer>
        </div>
    </main>
</body>
<script>
    const swiper = new Swiper(".swiper", {
        direction: "horizontal",
        loop: true,
        autoHeight: false,
        centeredSlides: true,
        slidesPerView: 1,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 40
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 40
            }
        },

        // // If we need pagination
        // pagination: {
        //     el: ".swiper-pagination"
        // },

        // // Navigation arrows
        // navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev"
        // }

        // And if we need scrollbar
        /*scrollbar: {
    el: '.swiper-scrollbar',
  },*/
    });
</script>

</html>