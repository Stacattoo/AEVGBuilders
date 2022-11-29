<?php
include("include/dbh.admin.php");
$dbh = new dbHandler();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="include/style.css">
    <link rel="stylesheet" href="admin.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="moment.js"></script>
    <script src="admin.js"></script>

</head>

<body>
    <div class="container-fluid m-0 p-0">
        <div class="position-fixed d-print-none">
            <main>
                <div class="d-flex flex-nowrap">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
                        <a href="/" class="d-flex mx-auto align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <img src="../images/waevg.png" class="text-center" height="45">
                        </a>
                        <div class="text-uppercase text-center fw-bold fs-6 d-none d-lg-inline mt-3 text-info">
                            Admin
                        </div>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link text-white" aria-current="page" id="dashboardNav">
                                    <i class="fad fa-analytics bi me-2"></i>
                                    <span class="d-none d-lg-inline">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" id="employeeNav">
                                    <i class="far fa-user-alt bi me-2"></i>
                                    <span class="d-none d-lg-inline">Employee</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" id="clientNav">
                                    <i class="far fa-user-alt bi me-2"></i>
                                    <span class="d-none d-lg-inline">Client</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" id="projectNav">
                                    <i class="fad fa-folder-open bi me-2"></i>
                                    <span class="d-none d-lg-inline">Finished Projects</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" id="scheduleNav">
                                    <i class="fad fa-calendar-alt bi me-2"></i>
                                    <span class="d-none d-lg-inline">Project Status</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" id="materialsNav">
                                    <i class="fal fa-paperclip bi me-2"></i>
                                    <span class="d-none d-lg-inline">Materials</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" id="blockedNav">
                                    <i class="fas fa-ban bi me-2"></i>
                                    <span class="d-none d-lg-inline">Archives</span>
                                </a>
                            </li>
                        </ul>

                        <medium id="timeNow"></medium>
                        <hr>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fal fa-user me-2"></i>
                                <strong class="d-none d-lg-inline text-uppercase">Admin</strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" data-bs-toggle="modal" href="#updateProfileModal">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="login/login.php">Sign out</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </main>
        </div>

        <div id="content" class="pt-3">

        </div>

    </div>

    <!-- <div class="container-fluid m-0 p-0">
        <div class="position-fixed d-print-none">
            <main>
                <div class="d-flex flex-column flex-nowrap p-3 text-white bg-dark">
                    <a class="d-none d-lg-inline d-flex my-3 mb-md-0 me-auto align-items-center text-white text-decoration-none">
                        <i class="fs-4 fad fa-shield bi me-2"></i>
                        <span class="">AEVG Builders</span>
                    </a>
                    <div class="text-uppercase fw-bold fs-6 ms-1 d-none d-lg-inline mt-3 text-info">
                        Admin
                    </div>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <button type="button" id="dashboardNav" class="nav-link text-white active">
                                <i class="fad fa-analytics bi me-2"></i>
                                <span class="d-none d-lg-inline">Dashboard</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" id="employeeNav" class="nav-link text-white">
                                <i class="far fa-user-alt bi me-2"></i>
                                <span class="d-none d-lg-inline">Employee</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" id="clientNav" class="nav-link text-white">
                               
                                <i class="far fa-user-alt bi me-2"></i>
                                <span class="d-none d-lg-inline">Client</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" id="projectNav" class="nav-link text-white">
                                <i class="fad fa-folder-open bi me-2"></i>
                                <span class="d-none d-lg-inline">Project</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" id="scheduleNav" class="nav-link text-white">
                                <i class="fad fa-calendar-alt bi me-2"></i>
                                <span class="d-none d-lg-inline">Schedule</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" id="materialsNav" class="nav-link text-white">
                                <i class="fal fa-paperclip bi me-2"></i>
                                <span class="d-none d-lg-inline">Materials</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" id="blockedNav" class="nav-link text-white">
                                <i class="fas fa-ban bi me-2"></i>
                                <span class="d-none d-lg-inline">Blocked Users</span>
                            </button>
                        </li>
                    </ul>
                    <small id="timeNow"></small>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fad fa-shield me-2"></i>
                            <strong class="d-none d-lg-inline text-uppercase">Admin</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" data-bs-toggle="modal" href="#updateProfileModal">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="login/login.php">Sign out</a></li>
                        </ul>
                    </div>
                </div>

                <div class="b-example-divider"></div>
            </main>
        </div>

        <div id="content" class="pt-3">

        </div>

    </div> -->

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

</html>