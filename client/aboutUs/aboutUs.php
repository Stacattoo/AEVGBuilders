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
  <!-- <script src="login.js"></script> -->
</head>


<body>
  <div class="container-fluid">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="../../images/aevg.png" class="" height="45">
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="../home/home.php" class="nav-link px-2 link-dark">Home</a></li>
        <li><a href="#" class="nav-link px-2 link-secondary">About Us</a></li>
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
            <li><a class="dropdown-item" href="../order/order.php">Order</a></li>
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

  <main class="container">
    <div class="background-img">
    <div class="blur-effect">
    <div class="p-4 p-md-5 mb-4 rounded text-light">
    
      <div class="col-md-6 px-0">
        <h1 class="display-4">AEVG BUILDERS</h1>
        <p class="lead my-3">The design and construction company has been running at a prominent level of excellence for exactly 5 years, they supply quality design and construction and are progressive and competitive in the design and construction industry.
        </p>
        <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
      </div>
      </div>
      </div>
    </div>

    <div class="row mb-2">
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Architect</strong>
            <h3 class="mb-0">Yel Villalon Galang</h3>
            <p class="card-text mb-auto">Founder of AEVG builders. After 2 years of working in Singapore Architect Galang decided to start his design and construction company in San Pablo, Hagonoy Bulacan. </p>

          </div>
          <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>
            </svg>

          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Engineer</strong>
            <h3 class="mb-0">Name</h3>
            <p class="mb-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique officia ea unde, illum quia voluptatum quod iusto! Blanditiis consectetur, sapiente, accusantium, qui reprehenderit in omnis reiciendis nobis eius numquam sequi?</p>
          </div>
          <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>
            </svg>

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
    
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3243.164121913461!2d120.7510418682818!3d14.836823687455547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396504a57883527%3A0xb11f1fe4dbc458eb!2sSan%20Pablo%2C%20Hagonoy%2C%20Bulacan!5e0!3m2!1sen!2sph!4v1663689346417!5m2!1sen!2sph" class="w-100"  height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>


    <div class="container">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">

        </ul>
        <p class="text-center text-muted">&copy; 2017 AEVG BUILDERS</p>

      </footer>
    </div>

</body>

</html>