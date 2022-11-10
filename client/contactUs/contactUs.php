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
        <li><a href="../aboutUs/aboutUs.php" class="nav-link px-2 link-dark">About Us</a></li>
        <li><a href="#" class="nav-link px-2 link-secondary">Projects</a></li>
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
  <div class="container">
    <div class="col-md-7 col-lg-8">
      <h4 class="mb-3">Contact Us</h4>
      <form class="needs-validation" novalidate>

        <div class="row g-3">
          <div class="col-sm-6">
            <label for="firstName" class="form-label">First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
          </div>

          <div class="col-sm-6">
            <label for="lastName" class="form-label">Last name</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
          </div>

          <div class="col-12">
            <label for="contact number" class="form-label">Contat Number</label>
            <div class="input-group has-validation">
              <input type="text" class="form-control" id="contactno" placeholder="Contact Number" required>
            </div>
          </div>

          <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">

          </div>

          <div class="col-12">
            <label for="address" class="form-label">Project Location</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
          </div>

          <div class="col-12">
            <label for="address2" class="form-label">Target Date of Construction</label>
            <input type="date" class="form-control" id="date" placeholder="Apartment or suite">
          </div>

          <!-- <div class="col-md-5">
          <label for="country" class="form-label">Country</label>
          <select class="form-select" id="country" required>
            <option value="">Choose...</option>
            <option>United States</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid country.
          </div>
        </div>

        <div class="col-md-4">
          <label for="state" class="form-label">State</label>
          <select class="form-select" id="state" required>
            <option value="">Choose...</option>
            <option>California</option>
          </select>
          <div class="invalid-feedback">
            Please provide a valid state.
          </div>
        </div>

        <div class="col-md-3">
          <label for="zip" class="form-label">Zip</label>
          <input type="text" class="form-control" id="zip" placeholder="" required>
          <div class="invalid-feedback">
            Zip code required.
          </div>
        </div> -->
        </div>


        <div class="my-3">
          <label for="pt" class="form-label">Project Type</label>
          <div class="form-check">
            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
            <label class="form-check-label" for="credit">Residential</label>
          </div>
          <div class="form-check">
            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
            <label class="form-check-label" for="debit">Commercial/Retail Design</label>
          </div>
          <div class="form-check">
            <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
            <label class="form-check-label" for="paypal">Mixed-Use</label>
          </div>
          <div class="form-check">
            <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
            <label class="form-check-label" for="paypal">Institutional</label>
          </div>
          <div class="form-check">
            <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
            <label class="form-check-label" for="paypal">Industrial</label>
          </div>
          <div class="form-check">
            <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
            <label class="form-check-label" for="paypal">Others</label>
          </div>
        </div>


        <div class="row gy-3">
          <div class="col-md-6">
            <label for="cc-name" class="form-label">Lot Area</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
          </div>

          <div class="col-md-6">
            <label for="cc-number" class="form-label">Number of Floors</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
              <option selected>Select</option>
              <option value="1">One-Storey</option>
              <option value="2">Two-Storey</option>
              <option value="3">Three-Storey</option>
              <option value="1">Four-Storey</option>
              <option value="2">Mid-rise Storey</option>
              <option value="3">High-rise Storey</option>
            </select>
          </div>

          <div class="col-md-3">
            <label for="cc-expiration" class="form-label">Nature of Business</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              Outsourcing / BPO Offices
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
              Local Business Office

            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Retail Store
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
              <label class="form-check-label" for="flexCheckChecked">
                Food and Beverages
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Sports and Recreation
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
              <label class="form-check-label" for="flexCheckChecked">
                Wellness
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
              <label class="form-check-label" for="flexCheckChecked">
                Others
              </label>
            </div>
          </div>


          <hr class="my-4">
          <div class="row g-2">
          <h4 class="mb-3">Set your Appointment</h4>
            <div class="col-md">
            <div class="form-floating">
                <select class="form-select" id="floatingSelectGrid">
                  <option selected>select </option>
                  <option value="1">Virtual Meeting</option>
                  <option value="2">Meet up</option>
                </select>
                <label for="floatingSelectGrid">Preferred Meeting</label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                <select class="form-select" id="floatingSelectGrid">
                  <option selected>select </option>
                  <option value="1">Shangri-la</option>
                  <option value="2">SM Megamall</option>
                </select>
                <label for="floatingSelectGrid">Location</label>
              </div>
            </div>
          </div>

          <div class="col-12">
            <label for="address2" class="form-label">Preferred Date</label>
            <input type="date" class="form-control" id="date" placeholder="">
          </div>
          <div class="col-12">
            <label for="address2" class="form-label">Preferred Time</label>
            <input type="time" class="form-control" id="time" placeholder="">
          </div>

          <button class="w-100 btn btn-primary btn-lg" type="submit">Set an Appointment</button>
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