<?php
include_once("../include/dbh.inc.php");
$dbh = new dbHandler;
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../include/style.css">
    <link rel="stylesheet" href="home.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
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

        <div class="b-example-divider"></div>

  <div class="container px-4 py-5" id="custom-cards">
    <h2 class="text-center pb-2 border-bottom ">Materials</h2>
    
		<nav class="nav d-flex justify-content-center">
			<a class="p-2 link-secondary" href="#">All</a>
			<a class="p-2 link-secondary" href="#">Woods</a>
			<a class="p-2 link-secondary" href="#">Concretes</a>
			<a class="p-2 link-secondary" href="#">Steel</a>
			<a class="p-2 link-secondary" href="#">Tiles</a>
			<a class="p-2 link-secondary" href="#">Glass</a>
			<a class="p-2 link-secondary" href="#">Paints</a>
			<a class="p-2 link-secondary" href="#">Roofs</a>
			<a class="p-2 link-secondary" href="#">Lumbers</a>

            
        
            </nav>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
      <div class="col">
        <div class="card card-cover h-60 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-1.jpg');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h3>
        
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover h-60 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-2.jpg');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Much longer title that wraps to multiple lines</h3>
           <!-- <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto">
                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
              </li>
              <li class="d-flex align-items-center me-3">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg>
                <small>Pakistan</small>
              </li>
              <li class="d-flex align-items-center">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
                <small>4d</small>
              </li>
            </ul> !-->
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover h-60 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-3.jpg');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h3>
        
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-cover h-60 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-3.jpg');">
          <div class="d-flex flex-column h-60 p-5 pb-3 text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h3>
        
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-cover h-60 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-3.jpg');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h3>
        
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-cover h-60 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-3.jpg');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h3>
        
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-cover h-60 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-3.jpg');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h3>
        
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-cover h-60 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-3.jpg');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h3>
        
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-cover h-60 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-3.jpg');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h3>
        
          </div>
        </div>
      </div>

    </div>
</body>
<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">

        </ul>
        <p class="text-center text-muted">&copy; 2017 AEVG BUILDERS</p>

    </footer>   

</html>