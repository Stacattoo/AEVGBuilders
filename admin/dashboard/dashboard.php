<?php
include("../include/dbh.admin.php");
$dbh = new dbHandler;
?>


<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="dashboard/dashboard.js"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="d-flex justify-content-between mx-4">
            <h3><i class="fal fa-chart-line me-2"></i></i>Dashboard</h3>
        </div>
        <hr>

        <div class="container-fluid">
            <div class="mt-5">
                <div class="row my-3">
                    <div class="col">
                        <div class="card h-100 mb-3 border-0" style="background-color:#c4fff9; cursor: pointer;" id="clientDash">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <i class="far fa-user-alt bi me-2 fa-3x"></i>

                                    </div>
                                    <div class="col text-end">
                                        <h1 class="card-title"><span id="totalClients1"></span></h1>
                                        <h6>Total number of Clients</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 mb-3 border-0 " style="background-color:#90e0ef; cursor: pointer;" id="projectDash">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <i class="fad fa-folder-open bi me-2 fa-3x"></i>
                                    </div>
                                    <div class="col text-end">
                                        <h1 class="card-title"><span id="totalProjects"></span></h1>
                                        <a href="#" class="stretched-link h6 text-dark text-decoration-none">Finished Projects</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 mb-3 border-0 " style="background-color:#fcb9b2; cursor: pointer;" id="userDash">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <i class="far fa-solid fa-users fa-3x"></i>
                                    </div>
                                    <div class="col text-end">
                                        <h1 class="card-title"><span id="totalRegisteredUser"></span></h1>
                                        <h6> Registered Users</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 mb-3 border-0  " style="background-color:#a0c4ff; cursor: pointer;" id="employeeDash">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <i class="far fa-solid fa-users fa-3x"></i>
                                    </div>
                                    <div class="col text-end">
                                        <h1 class="card-title"><span id="totalEmployees"></span></h1>
                                        <h6> Employees</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card text-bg-light mb-3">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div>Total Number of Handled Clients</div>
                                    <div>
                                        <select class="form-select w-auto" aria-label="Default select example" id="years">
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="height: 300px;">
                                    <canvas id="myChart"></canvas>
                                </div>

                                <h5 class="card-title">Total no. of Clients: <span id="totalClients"></span></h5>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <!-- PLEASE REDESIGN THIS TABLE -->

                        <div class="card text-bg-light mb-3">

                            <h3 class="mt-3 mx-2 mb-3">Top 5 Most Popular Project</h3>

                            <table class="table table-sm  align-middle">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Likes</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="popularProject">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mt-3">
                            <h3>Clients Feedback</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Feedback</th>
                                        <th>Date & Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="feedbackContent">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mt-3">
                            <h3>Project Approval</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name</th>
                                        <th>Employee ID</th>
                                        <th>Project Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Date & Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="projectContent">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- MODAL VIEW -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-5" id="projectModalBody">
                    <img class="img-fluid" src="../images/consultation.jpg">


                    <div class="d-flex justify-content-between w-100 mt-3">
                        <h2 class="fw-normal">Title </h2>
                        <div>
                            <i class=" fas fa-heart react"></i> <span>4</span>
                        </div>
                    </div>
                    <h6 class="text-muted">Category</h6>
                    <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum unde porro suscipit amet eos quae consectetur, beatae incidunt, assumenda, quas cupiditate alias. Inventore dignissimos quo illo? Aliquam maiores ea fugit.
                        Id ducimus, harum assumenda aperiam sapiente aut pariatur cupiditate, quis excepturi blanditiis non nostrum beatae nulla saepe cum illum atque? Neque aspernatur placeat veritatis cum odio quam ducimus consectetur reprehenderit.</p>
                </div>
            </div>
        </div>
    </div>
</body>
