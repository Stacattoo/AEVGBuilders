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
  <title>About Us</title>
  <link rel="stylesheet" href="../include/style.css">
  <link rel="stylesheet" href="aboutUs.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="aboutUs.js"></script>
</head>


<body>
  <div class="container-fluid">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="../../images/aevg.png" class="" height="45">
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="../home/home.php" class="nav-link px-2 link-dark">Home</a></li>
        <li><a href="../aboutUs/aboutUs.php" class="nav-link px-2 link-secondary">About Us</a></li>
        <li><a href="../projects/project.php" class="nav-link px-2 link-dark">Projects</a></li>
        <li><a href="../materials/materials.php" class="nav-link px-2 link-dark">Materials</a></li>
        <?php if (isset($_SESSION['id']) && !$dbh->getSched($_SESSION['id']) >= '1') { ?>
          <li><a href="../contactUs/contactUs.php" class="nav-link px-2 link-dark">Appointment</a></li>
        <?php }  ?>
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

              </div>
            <?php } ?>
          </div>

        <?php } ?>

      </div>
    </header>
  </div>

  <main class="container">
    <!-- <div class="col-xl-10 offset-xl-1 rounded position-relative">
      <div id="titleCarousel" class="carousel slide carousel-fade position-relative" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" id="c-one"></div>
          <div class="carousel-item" id="c-two"></div>
          <div class="carousel-item" id="c-three"></div>
        </div>
      </div>
      <div class="row">
        <h1 class="text-center">Title Text</h1>
      </div>
    </div>

 -->



    <div class="background-img mb-4">

      <div class="blur-effect ">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner" data-bs-interval="1500">
            <div class="carousel-item active">
              <img src="../../images/10.jpg" class="d-block w-100 img-fluid bg-carousel" style="height: 435px;">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="../../images/2.jpg" class="d-block w-100 img-fluid bg-carousel" style="height: 435px;">
            </div>
            <div class="carousel-item">
              <img src="../../images/3.jpg" class="d-block w-100 img-fluid bg-carousel" style="height: 435px;">
            </div>
          </div>

        </div>
        <div class="p-4 p-md-5 mb-4 rounded text-light position-absolute top-0 left-0 blur-effect">

          <div class="col-md-6 px-0">
            <h1 class="display-4">AEVG BUILDERS</h1>
            <p class="lead my-3">The design and construction company has been running at a prominent level of excellence for exactly 5 years, they supply quality design and construction and are progressive and competitive in the design and construction industry.
            </p>

            <p class="lead mb-0">
            <div class="alert alert-warning" role="alert" id="appAlert">
              <h3 class="text-black">Pending for Approval</h3>
              <p class="h6 text-muted">Kindly wait for an employee to approve your request.</p>
            </div>
            </p>

            <p class="lead mb-0"><button type="button" id="schedBtn" class="btn btn-warning">
                <!-- REMOVE SI href -->
                Schedule an Appointment.
              </button></p>

          </div>
        </div>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Architect</strong>
            <h3 class="mb-0">Rhina Marie Monforte</h3>
            <p class="card-text mb-auto">The lead architect at AEVG Builders, came from the Albay province. Having professionaly worked in a corporate setting, contracting, and design outsourcing for years in Metro Manila, she has built a network of clients.</p>

          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="../../images/3bb1db2fc1454432143e08cd67e2126b.jpg" width="200" height="250" alt="">
          </div>
        </div>
      </div>


      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">3D Visualizer</strong>
            <h3 class="mb-0">Cochise Macahilig</h3>
            <p class="mb-auto">Is capable of bringing any 2D plans to a realistic 3D Model. She originated in Bulacan. With an eye for details, she assists the team in presenting any design concept thru meticulous 3D model which usually amazes the clients.</p>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="../../images/37ea903719dc841b2a2aa03693256b8a.jpg" width="200" height="250" alt="">
          </div>
        </div>
      </div>
    </div>
    <hr class="featurette-divider">

    <div class="row ">
      <div class="col-md-4 d-flex align-items-center ">
        <div>

          <h1 class="display-4">AEVG BUILDERS</h1>

          <p class="lead mb-2"> <i class="mx-2 fas fa-map-marker-alt"></i> 002 San Pablo, Hagonoy Bulacan .</p>
          <p class="lead mb-2"> <i class="mx-2 fas fa-phone-alt"></i> +63 977 852 7307.</p>
          <p class="lead "><i class="mx-2   fas fa-envelope"></i> evgalangdesign@gmail.com</p>
        </div>
      </div>
      <div class="col-md-8">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3243.164121913461!2d120.7510418682818!3d14.836823687455547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396504a57883527%3A0xb11f1fe4dbc458eb!2sSan%20Pablo%2C%20Hagonoy%2C%20Bulacan!5e0!3m2!1sen!2sph!4v1663689346417!5m2!1sen!2sph" class="w-100" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>


    <div class="container">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">

        </ul>
        <p class="text-center text-muted">&copy; 2017 AEVG BUILDERS</p>

      </footer>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loginPrompt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">You must Log-in First</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Would you like to log-in?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a type="button" href="../login/login.php" class="btn btn-primary">Log-in</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->

    <?php if (!isset($_SESSION['id'])) { ?>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="card-header">
              <h4 class="py-3 ms-4">Scheduling</h4>

            </div>
            <div class="modal-body text-start ps-5 px-5">

              <p>If you have enquiries regarding our firm, you may schedule a meeting with an architect.
                You may also call us at +63912-3456-789. Usually, our staff responds in 30 minutes.</p>
              <h5 class="mt-3 mb-3">You have to be logged in to set an appointment. </h5>
            </div>

            <div class="modal-footer d-flex justify-content-end">
              <button type="button" class="btn btn-gray" data-bs-dismiss="modal">Close</button>
              <a class="btn btn-primary" href="../login/login.php">Log-in</a>

            </div>

          </div>
        </div>
      </div>
    <?php } else { ?>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="card-header">
              <h4 class="py-3 ms-4">Scheduling</h4>

            </div>
            <div class="modal-body text-start ps-5 px-5">
              <p>If you have enquiries regarding our firm, you may schedule a meeting with an architect.
                You may also call us at +63912-3456-789. Usually, our staff responds in 30 minutes.</p>
              <h5 class="mt-3 mb-3">Title of the reason (optional): </h5>
              <form id="scheduleForm">
                <textarea class="form-control" aria-label="Reason for Scheduling" name="reason"></textarea>

                <div class="alert alert-danger mt-3 col-12" role="alert" id="alertsched">
                </div>
                <div class="modal-footer d-flex justify-content-end">
                  <button type="button" class="btn btn-gray" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>

              </form>
            </div>

          </div>
        </div>
      </div>

    <?php } ?>

</body>

</html>