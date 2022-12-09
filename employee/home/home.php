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
                <div class="d-flex flex-nowrap">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
                        <a href="/" class="d-flex mx-auto align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <img src="../../images/waevg.png" class="text-center" height="45">
                        </a>
                        <div class="text-uppercase text-center fw-bold fs-6 d-none d-lg-inline mt-3 text-info">
                            Employee
                        </div>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <!-- <li class="nav-item">
                                <a href="#" class="nav-link text-white" aria-current="page" id="dashboardNav">

                                    <i class="fad fa-analytics bi me-2"></i>
                                    Dashboard
                                </a>
                            </li> -->
                            <li>
                                <a href="#" class="nav-link active text-white" id="clientsNav">

                                    <i class="far fa-user-alt bi me-2"></i>
                                    Clients
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" id="messageNav">

                                    <i class="fad fa-calendar-alt bi me-2"></i>
                                    Message
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" id="reportNav">

                                    <i class="fal fa-paperclip bi me-2"></i>
                                    Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" id="projectNav">

                                    <i class="fas fa-city bi me-2"></i>
                                    Projects
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" id="preProjectNav">

                                    <i class="fas fa-city bi me-2"></i>
                                    Pre-Posted Projects
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" id="disProjectNav">

                                    <i class="fas fa-city bi me-2"></i>
                                    Disapproved Post Projects
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" id="portfolio">

                                    <i class="fas fa-city bi me-2"></i>
                                    Portfolio
                                </a>
                            </li>
                        </ul>
                        <medium id="timeNow"></medium>
                        <hr>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../profile/<?php echo $dbh->getValueByProfileID('profile_picture', $_SESSION['id']); ?>" alt="" width="32" height="32" class="rounded-circle me-2">
                                <strong><?php echo $dbh->getFullname($_SESSION['id']); ?></strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <li><button class="dropdown-item" data-bs-toggle="modal" id="profileNav">Profile</button></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../../logout/logoutEmployee.php">Sign out</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </main>
        </div>

        <div id="content" class="pt-3">

        </div>

    </div>


    <!-- UPDATE PROFILE -->
    <div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="profileForm">
                    <div class="modal-body">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="username" name="username" placeholder="username" minlength="5" required>
                            <label for="text">Username</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" email required>
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="8" required>
                            <label for="password">Password</label>
                        </div>
                        <div id="pass" class="collapse">
                            <div class="form-floating mb-2">
                                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password" required disabled>
                                <label for="newPassword">New Password</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Password" required disabled>
                                <label for="confirmPassword">Re-type New Password</label>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary w-100" data-bs-toggle="collapse" data-bs-target="#pass">Change Password</button>
                        <div class="alert alert-danger mt-2 py-2 text-center" role="alert" id="errorAlert">
                            {{ errorMessage }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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
</div>

</html>