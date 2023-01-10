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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="contactUs.js"></script>
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
        <li><a href="../contactUs/contactUs.php" class="nav-link px-2 link-secondary">Appointment</a></li>
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
  <main class="container ">
    <div>
      <form id="appointForm">
        <!-- Step1 -->
        <div id="step1">
          <div class="card ">
            <div class="card-header">
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 15%"></div>
              </div>
            </div>

            <div class="card-body mx-auto">

              <h2 class="mb-3">Set an Appointment</h2>
              <p class="h6 text-muted">Please check your information.</p>

              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <input type="text" class="form-control" name="firstName" value="<?php echo $dbh->getValueByID('firstName', $_SESSION['id']); ?>" readonly>
                </div>

                <div class="col-sm-6">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control" name="lastName" value="<?php echo $dbh->getValueByID('lastName', $_SESSION['id']); ?>" readonly>
                </div>

                <div class="col-sm-8">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="you@example.com" value="<?php echo $dbh->getValueByID('email', $_SESSION['id']); ?>" readonly>

                </div>
                <div class="col-sm-4">
                  <label for="contactNo" class="form-label">Contact Number</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" name="contactNo" placeholder="Contact Number" value="<?php echo $dbh->getValueByID('contact_no', $_SESSION['id']); ?>">
                  </div>
                </div>
              </div>


            </div>
            <div class="d-flex justify-content-end mx-3 my-3 px-3">
              <button type="button" id="step1Btn" class="btn btn-outline-dark btn-lg ">Next <i class="fas fa-chevron-right"></i></button>
            </div>
          </div>
        </div>

        <!-- Step 2 -->
        <div id="step2">
          <div class="card ">
            <div class="card-header">
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 15%"></div>
              </div>
            </div>

            <div class="card-body mx-auto">
              <h2 class="mb-3">Set an Appointment</h2>

              <div class="row g-3">
                <div class="col-sm-6">
                  <h5 class="form-label mb-4">Project Type</h5>
                  <div class="form-check">
                    <input id="projectType1" name="projectType" type="radio" value="Residential" class="form-check-input" required>
                    <label class="form-check-label" for="projectType1">Residential</label>
                  </div>
                  <div class="form-check">
                    <input id="projectType2" name="projectType" type="radio" value="Commercial/Retail Design" class="form-check-input">
                    <label class="form-check-label" for="projectType2">Commercial/Retail Design (i.e. restaurants, cafes, retail shops etc.)
                    </label>
                  </div>
                  <div class="form-check">
                    <input id="projectType3" name="projectType" type="radio" value="Mixed-Use" class="form-check-input">
                    <label class="form-check-label" for="projectType3">Mixed-Use (i.e. commercial-residential condominiums)
                    </label>
                  </div>
                  <div class="form-check">
                    <input id="projectType4" name="projectType" type="radio" value="Institutional" class="form-check-input">
                    <label class="form-check-label" for="projectType4">Institutional (i.e. government facilities, schools, churches etc.)</label>
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
                    <input id="projectType8" name="projectType" type="radio" value="Renovation" class="form-check-input">
                    <label class="form-check-label" for="projectType8">Renovation</label>
                  </div>
                  <div class="form-check" id="othersBtn">
                    <input id="projectType7" name="projectType" type="radio" value="Others" class="form-check-input">
                    <label class="form-check-label" for="projectType7">Others</label>

                    <div class="" id="otherRef">
                      <label for="area-img" id="sketch" class="form-label">Provide site images and sketches (if available)</label>
                      <input type="file" class="form-control" id="sketch" name="imageEdit[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1" multiple>
                      <input type="hidden" id="edit-image1" name="imageEditStore" value="">
                    </div>

                    <!-- <input type="text" class="form-control" name="projectTypeOthers" id="projectID"> -->
                  </div>
                </div>

                <div class="col-sm-6">
                  <h5 class="form-label mb-4">Nature of Business</h5>
                  <div class="form-check" required>
                    <input class="form-check-input" name="businessType[]" type="checkbox" value="Outsourcing / BPO Offices" id="flexCheckDefault1">
                    <label class="form-check-label" for="flexCheckDefault1">
                      Outsourcing / BPO Offices
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="businessType[]" type="checkbox" value="Local Business Office" id="flexCheckChecked2">
                    <label class="form-check-label" for="flexCheckChecked2">
                      Local Business Office (i.e. local company office/headquarters)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="businessType[]" type="checkbox" value="Retail Store" id="flexCheckDefault3">
                    <label class="form-check-label" for="flexCheckDefault3">
                      Retail Store (i.e. supermarket, convenience stores, clothing store, kiosks, etc.)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="businessType[]" type="checkbox" value="Food and Beverages" id="flexCheckChecked4">
                    <label class="form-check-label" for="flexCheckChecked4">
                      Food and Beverages (i.e. restaurants, cafe, pastry shop,resto bar, etc.)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="businessType[]" type="checkbox" value="Sports and Recreation" id="flexCheckDefault5">
                    <label class="form-check-label" for="flexCheckDefault5">
                      Sports and Recreation (i.e. sports facility, gym, arenas, etc.)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="businessType[]" type="checkbox" value="Wellness" id="flexCheckChecked6">
                    <label class="form-check-label" for="flexCheckChecked6">
                      Wellness (i.e. salon and spa, etc.)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="businessType[]" value="Others" type="checkbox" id="btnOthers">
                    <label class="form-check-label" for="btnOthers">
                      Others
                    </label>
                    <input type="text" class="form-control" name="businessTypeName" id="inputOthers">
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <div id="div1" class="projectTypeListImages" data-name="Residential">
                <h5 class="form-label mt-3">Residential</h5>
                <div class="row row-cols-1 row-cols-3 align-items-stretch g-2 ">
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios1" value="1">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios1"> <img src="../../images/contactUsImg/1.jpg" alt="" class="img-fit rounded-3"> </label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios2" value="2">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios2"><img src="../../images/contactUsImg/2.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios3" value="3">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios3"> <img src="../../images/contactUsImg/3.png" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                </div>
              </div>
              <div id="div2" class="projectTypeListImages" data-name="Commercial/Retail Design">
                <h5 class="form-label ">Commercial/Retail Design</h5>
                <div class="row row-cols-1 row-cols-3 align-items-stretch g-2 ">
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios4" value="4">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios4"> <img src="../../images/contactUsImg/4.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios5" value="5">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios5"> <img src="../../images/contactUsImg/5.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios6" value="6">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios6"> <img src="../../images/contactUsImg/6.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                </div>
              </div>
              <div id="div3" class="projectTypeListImages" data-name="Mixed-Use">
                <h5 class="form-label ">Mixed-Use</h5>
                <div class="row row-cols-1 row-cols-3 align-items-stretch g-2 ">
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios7" value="7">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios7"> <img src="../../images/contactUsImg/7.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios8" value="8">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios8"> <img src="../../images/contactUsImg/8.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios9" value="9">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios9"> <img src="../../images/contactUsImg/9.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                </div>
              </div>
              <div id="div4" class="projectTypeListImages" data-name="Institutional">
                <h5 class="form-label ">Institutional</h5>
                <div class="row row-cols-1 row-cols-3 align-items-stretch g-2 ">
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios10" value="10">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios10"> <img src="../../images/contactUsImg/10.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios11" value="11">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios11"> <img src="../../images/contactUsImg/11.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios12" value="12">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios12"> <img src="../../images/contactUsImg/12.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                </div>
              </div>
              <div id="div5" class="projectTypeListImages" data-name="Industrial">
                <h5 class="form-label ">Industrial</h5>
                <div class="row row-cols-1 row-cols-3 align-items-stretch g-2 ">
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios13" value="13">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios13"> <img src="../../images/contactUsImg/13.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios14" value="14">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios14"> <img src="../../images/contactUsImg/14.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios15" value="15">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios15"> <img src="../../images/contactUsImg/15.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                </div>
              </div>
              <div id="div6" class="projectTypeListImages" data-name="Interior">
                <h5 class="form-label ">Interior</h5>
                <div class="row row-cols-1 row-cols-3 align-items-stretch g-2 ">
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios16" value="16">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios16"> <img src="../../images/contactUsImg/16.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios17" value="17">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios17"> <img src="../../images/contactUsImg/17.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios18" value="18">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios18"> <img src="../../images/contactUsImg/18.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                </div>
              </div>
              <div id="div7" class="projectTypeListImages" data-name="Renovation">
                <h5 class="form-label ">Renovation</h5>
                <div class="row row-cols-1 row-cols-3 align-items-stretch g-2 ">
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios19" value="16">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios19"> <img src="../../images/contactUsImg/19.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios20" value="17">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios20"> <img src="../../images/contactUsImg/20.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                      <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios21" value="18">
                      <label class="list-group-item rounded-3 p-0" for="listGroupCheckableRadios21"> <img src="../../images/contactUsImg/21.jpg" alt="" class="img-fit rounded-3"></label>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="d-flex justify-content-between mx-3 my-3 px-3">
              <button type="button" id="prev1Btn" class="btn btn-outline-dark btn-lg"><i class="fas fa-chevron-left"></i> Back</button>
              <button type="button" id="step2Btn" class="btn btn-outline-dark btn-lg">Next <i class="fas fa-chevron-right"></i></button>
            </div>
          </div>
        </div>

        <!-- STEP 3 -->
        <div id="step3">
          <div class="card ">
            <div class="card-header">
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 15%"></div>
              </div>
            </div>

            <div class="card-body mx-auto">

              <h2 class="mb-3">Set an Appointment</h2>

              <div class="row g-3">
                <div class="col-sm-9">
                  <label for="projLocation" class="form-label">Project Location</label>

                  <select name="province" class="form-select mt-1" id="province" required>
                    <option selected disabled>Select Province</option>
                  </select>

                  <select name="municipality" class="form-select mt-1" id="municipality" required>
                    <option value="">Select Municipality</option>
                  </select>

                  <!-- <input type="text" name="barangay" value="Barangay" class="form-control mt-1" id="barangay" required> -->
                  <input type="text" class="form-control mt-1" id="projLoc_id" name="projLocation" placeholder="House no. & Barangay Example: 1234 Main St" required>
                </div>

                <div class="col-sm-3">
                  <label for="cc-name" class="form-label">Lot Area<p class="fw-light">(ex. sqm)</p></label>
                  <input type="text" class="form-control" name="lotArea" id="cc-name" placeholder="" required>
                </div>

                <div class="col-sm-9">
                  <label for="cc-number" class="form-label">Number of Floors</label>
                  <!-- <select class="form-select form-select" name="noFloors" id="cc-number" aria-label=".form-select-lg example" required>
                    <option selected disabled>Select</option>
                    <option value="One-Storey">(1) One-Storey</option>
                    <option value="Two-Storey">(2) Two-Storey</option>
                    <option value="Three-Storey">(3) Three-Storey</option>
                    <option value="Four-Storey">(4) Four-Storey</option>
                    <option value="Mid-rise Storey">(5-6) Mid-rise Storey</option>
                    <option value="High-rise Storey">(7-9) High-rise Storey</option>
                  </select> -->
                  <input type="text" class="form-control" name="noFloors"  id="cc-number" required>
                </div>

                <div class="col-sm-3">
                  <label for="targetDate" class="form-label">Target Date of Construction</label>
                  <input type="date" class="form-control" id="targetDate" name="targetDate" required>
                </div>

                <div class="col-sm-9">
                  <!-- <label for="area-img" id="sketch" class="form-label">Provide site images and sketches (if available)</label>
                  <input type="file" class="form-control" id="sketch" name="imageEdit[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1" multiple>
                  <input type="hidden" id="edit-image1" name="imageEditStore" value=""> -->
                </div>
              </div>


            </div>
            <div class="d-flex justify-content-between mx-3 my-3 px-3">
              <button type="button" id="prev2Btn" class="btn btn-outline-dark btn-lg"><i class="fas fa-chevron-left"></i> Back</button>
              <button type="button" id="step3Btn" class="btn btn-outline-dark btn-lg">Next <i class="fas fa-chevron-right"></i></button>
            </div>
          </div>
        </div>

        <!-- STEP 4 -->
        <div id="step4">
          <div class="card ">
            <div class="card-header">
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 15%"></div>
              </div>
            </div>

            <div class="card-body mx-auto">

              <div class="row g-2">
                <h4 class="mb-3">Set your Appointment</h4>
                <div class="col-md">
                  <div class="form-floating">
                    <select class="form-select" name="meetType" id="meetType" required>
                      <option selected disabled>SELECT A PREFERED TYPE OF MEETING </option>
                      <option value="virtual">Virtual Meeting (Zoom)</option>
                      <option value="meetUp">Meet up</option>
                    </select>
                    <label for="meetType">Preferred Meeting</label>
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-floating">
                    <select class="form-select" name="meetLoc" id="meetLoc" required>
                      <option selected disabled>SELECT LOCATION</option>
                      <option value="Shangri-la">Shangri-la</option>
                      <option value="SM Megamall">SM Megamall</option>
                    </select>
                    <label for="floatingSelemeetLocctGrid">Location</label>
                  </div>
                </div>
              </div>
              <div class="row mt-3 ">
                <div class="col-sm-6">
                  <label for="address2" class="form-label">Preferred Date</label>
                  <input type="date" class="form-control" name="appointmentDate" id="appointmentDate" placeholder="" required>
                </div>
                <div class="col-sm-6">
                  <label for="address2" class="form-label">Preferred Time</label>
                  <input type="time" class="form-control" name="appointmentTime" id="appointmentTime" placeholder="" required>
                </div>
                <div class="col-6">
                  <div class="alert alert-danger mt-2" role="alert" id="alertErrorApp">
                  </div>
                </div>

                <button class="btn btn-primary mt-4" type="submit">Set an Appointment</button>
              </div>


            </div>
            <div class="d-flex justify-content-start mx-3 my-3 px-3">
              <button type="button" id="prev3Btn" class="btn btn-outline-dark btn-lg "><i class="fas fa-chevron-left"></i> Back</button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- <input class="form-control mx-4" type="text" name="businessTypeName" id="flexCheckChecked7"> -->

    <div class="container">
      <footer class="py-3 my-4">
        <hr>
        <p class="text-center text-muted">&copy; 2020 AEVG BUILDERS</p>

      </footer>
    </div>
  </main>

</body>

</html>
