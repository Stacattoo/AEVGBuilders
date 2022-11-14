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
  <title>Contact Us</title>
  <link rel="stylesheet" href="../include/style.css">
  <link rel="stylesheet" href="contactUs.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="contactUS.js"></script>
</head>


<body>
  <div class="container-fluid">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="../../images/aevg.png" class="" height="45">
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="../home/home.php" class="nav-link px-2 link-dark">Home</a></li>
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
  <div class="container">
    <div class="col-md-7 col-lg-8">
      <h4 class="mb-3">Contact Us</h4>
      <form id="appointForm">

        <div class="row g-3">
          <div class="col-sm-6">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" name="firstName" value="<?php echo $dbh->getValueByID('firstName', $_SESSION['id']); ?>" readonly>
          </div>

          <div class="col-sm-6">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lastName" value="<?php echo $dbh->getValueByID('lastName', $_SESSION['id']); ?>" readonly>
          </div>

          <div class="col-12">
            <label for="contactNo" class="form-label">Contact Number</label>
            <div class="input-group has-validation">
              <input type="text" class="form-control" name="contactNo" placeholder="Contact Number" value="<?php echo $dbh->getValueByID('contact_no', $_SESSION['id']); ?>" readonly>
            </div>
          </div>

          <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="you@example.com" value="<?php echo $dbh->getValueByID('email', $_SESSION['id']); ?>" readonly>

          </div>

          <div class="col-12">
            <label for="projLocation" class="form-label">Project Location</label>
            <input type="text" class="form-control" name="projLocation" id="projectLocEdit" placeholder="Example: 1234 Main St">
          </div>

          <div class="col-12">
            <label for="targetDate" class="form-label">Target Date of Construction</label>
            <input type="date" class="form-control" id="targetDate" name="targetDate">
          </div>

        </div>


        <div class="my-3">
          <label for="pt" class="form-label">Project Type</label>
          <div class="form-check">
            <input id="projectType1" name="projectType" type="radio" value="Residential" class="form-check-input" checked>
            <label class="form-check-label" for="projectType1">Residential</label>
          </div>
          <div class="form-check">
            <input id="projectType2" name="projectType" type="radio" value="Commercial/Retail Design" class="form-check-input">
            <label class="form-check-label" for="projectType2">Commercial/Retail Design</label>
          </div>
          <div class="form-check">
            <input id="projectType3" name="projectType" type="radio" value="Mixed-Use" class="form-check-input">
            <label class="form-check-label" for="projectType3">Mixed-Use</label>
          </div>
          <div class="form-check">
            <input id="projectType4" name="projectType" type="radio" value="Institutional" class="form-check-input">
            <label class="form-check-label" for="projectType4">Institutional</label>
          </div>
          <div class="form-check">
            <input id="projectType5" name="projectType" type="radio" value="Industrial" class="form-check-input">
            <label class="form-check-label" for="projectType5">Industrial</label>
          </div>
          <div class="form-check">
            <input id="projectType6" name="projectType" type="radio" value="Interior" class="form-check-input">
            <label class="form-check-label" for="projectType6">Interior</label>
          </div>
          <div class="form-check">
            <input id="projectType7" name="projectType" type="radio" value="Others" class="form-check-input">
            <label class="form-check-label" for="projectType7">Others</label>
            <input type="text" class="form-control" name="projectTypeOthers" id="projectID">
          </div>
        </div>


        <div class="row gy-3">
          <div class="col-md-6">
            <label for="cc-name" class="form-label">Lot Area</label>
            <input type="text" class="form-control" name="lotArea" id="cc-name" placeholder="">
          </div>

          <div class="col-md-6">
            <label for="cc-number" class="form-label">Number of Floors</label>
            <select class="form-select form-select-lg mb-3" name="noFloors" id="cc-number" aria-label=".form-select-lg example">
              <option selected disabled>Select</option>
              <option value="One-Storey">One-Storey</option>
              <option value="Two-Storey">Two-Storey</option>
              <option value="Three-Storey">Three-Storey</option>
              <option value="Four-Storey">Four-Storey</option>
              <option value="Mid-rise Storey">Mid-rise Storey</option>
              <option value="High-rise Storey">High-rise Storey</option>
            </select>
          </div>

          <div class="col-md-3">
            <label for="cc-expiration" class="form-label">Nature of Business</label>
            <div class="form-check">
              <input class="form-check-input" name="businessType[]" type="checkbox" value="Outsourcing / BPO Offices" id="flexCheckDefault1">
              <label class="form-check-label" for="flexCheckDefault1">
                Outsourcing / BPO Offices
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" name="businessType[]" type="checkbox" value="Local Business Office" id="flexCheckChecked2">
              <label class="form-check-label" for="flexCheckChecked2">
                Local Business Office
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" name="businessType[]" type="checkbox" value="Retail Store" id="flexCheckDefault3">
              <label class="form-check-label" for="flexCheckDefault3">
                Retail Store
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" name="businessType[]" type="checkbox" value="Food and Beverages" id="flexCheckChecked4">
              <label class="form-check-label" for="flexCheckChecked4">
                Food and Beverages
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" name="businessType[]" type="checkbox" value="Sports and Recreation" id="flexCheckDefault5">
              <label class="form-check-label" for="flexCheckDefault5">
                Sports and Recreation
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" name="businessType[]" type="checkbox" value="Wellness" id="flexCheckChecked6">
              <label class="form-check-label" for="flexCheckChecked6">
                Wellness
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" name="businessType[]" value="Others" type="checkbox" id="btnOthers">
              <label class="form-check-label" for="btnOthers">
                Others
              </label>
            </div>
          </div>
          <input class="form-control mx-4" type="text" name="businessTypeName" id="flexCheckChecked7">

          <hr class="my-4">
          <div class="row g-2">
            <h4 class="mb-3">Set your Appointment</h4>
            <div class="col-md">
              <div class="form-floating">
                <select class="form-select" name="meetType" id="meetType">
                  <option selected disabled>SELECT A PREFERED TYPE OF MEETING </option>
                  <option value="virtual">Virtual Meeting (Zoom)</option>
                  <option value="meetUp">Meet up</option>
                </select>
                <label for="meetType">Preferred Meeting</label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                <select class="form-select" name="meetLoc" id="meetLoc">
                  <option selected disabled>SELECT LOCATION</option>
                  <option value="Shangri-la">Shangri-la</option>
                  <option value="SM Megamall">SM Megamall</option>
                </select>
                <label for="floatingSelemeetLocctGrid">Location</label>
              </div>
            </div>
          </div>
          <div class="col-12">
            <label for="address2" class="form-label">Preferred Date</label>
            <input type="date" class="form-control" name="appointmentDate" id="appointmentDate" placeholder="">
          </div> 
          <div class="col-12">
            <label for="address2" class="form-label">Preferred Time</label>
            <input type="time" class="form-control" name="appointmentTime" id="appointmentTime" placeholder="">
          </div>
          <div class="alert alert-danger" role="alert" id="alertError">
            Error!
          </div>
          
          <button class="w-100 btn btn-primary btn-lg" type="submit" id="setBtn">Set an Appointment</button>
         
        </form>

    </div>
  </div>
  </div>






  <div class="container">
    <footer class="py-3 my-4">
      <hr>
      <p class="text-center text-muted">&copy; 2017 AEVG BUILDERS</p>

    </footer>
  </div>


</body>

</html>