<?php
include_once("../include/dbh.employee.php");
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
    <script src="home.js"></script>
</head>

<body>

    <div class="container-fluid m-0 p-0">
        <div class="position-fixed d-print-none">
            <main>
                <div class="d-flex flex-column flex-nowrap p-3 text-black bg-light">
                    <a class="d-none d-lg-inline d-flex my-3 mb-md-0 me-auto align-items-center text-black text-decoration-none">
                        <img src="../../images/aevg-nobg.png" class="text-center" height="45">

                    </a>
                    <div class="text-uppercase text-center fw-bold fs-6 d-none d-lg-inline mt-3 text-info">
                        Employee
                    </div>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <button type="button" id="dashboardNav" class="nav-link text-black active">
                                <i class="fad fa-analytics bi me-2"></i>
                                <span class="d-none d-lg-inline">Dashboard</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" id="studentsNav" class="nav-link text-black">
                                <i class="far fa-user-alt bi me-2"></i>
                                <span class="d-none d-lg-inline">Clients</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" id="scheduleNav" class="nav-link text-black">
                                <i class="fad fa-calendar-alt bi me-2"></i>
                                <span class="d-none d-lg-inline">Schedule</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" id="reportNav" class="nav-link text-black">
                                <i class="fal fa-paperclip bi me-2"></i>
                                <span class="d-none d-lg-inline">Report</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" id="projectNav" class="nav-link text-black">
                                <i class="fas fa-ban bi me-2"></i>
                                <span class="d-none d-lg-inline">Projects</span>
                            </button>
                        </li>
                    </ul>
                    <small id="timeNow"></small>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-black text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fad fa-user me-2"></i>
                            <strong class="d-none d-lg-inline text-uppercase">Employee</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" data-bs-toggle="modal" href="#updateProfileModal">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../../logout/logoutEmployee.php">Sign out</a></li>
                        </ul>
                    </div>
                </div>

                <div class="b-example-divider"></div>
            </main>
        </div>

        <div id="content" class="pt-3">

        </div>

    </div>

</body>

<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">

        </ul>
        <p class="text-center text-muted">&copy; 2020 AEVG BUILDERS</p>

    </footer>
</div>

</html>