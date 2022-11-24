<?php
include("../include/dbh.admin.php");
$dbh = new dbHandler;
?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js
"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="dashboard/dashboard.js"></script>

<div class="container-fluid ">
    <div class="d-flex justify-content-between mx-4">
        <h3><i class="fal fa-chart-line me-2"></i></i>Dashboard</h3>
    </div>
    <hr>
    
    <div class="container-fluid">
        <div class="mt-5">
            <div class="row">
                <div class="col">
                    <div class="card mb-3 " style="width: 15rem;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <i class="far fa-user-alt bi me-2 fa-3x"></i>

                                </div>
                                <div class="col">
                                    <h1 class="card-title"><span id="totalClients1"><!-- DITO NAGDIDISPLAY YUNG TOTAL --></span></h1>
                                    <h6>Total number of Clients</h6>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 " style="width: 15rem;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <i class="fad fa-folder-open bi me-2 fa-3x"></i>
                                </div>
                                <div class="col">
                                    <h1 class="card-title"><span id="totalProjects"><!-- DITO NAGDIDISPLAY YUNG TOTAL --></span></h1>
                                    <h6> Finished Projects</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                <div class="card mb-3 " style="width: 15rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <i class="far fa-solid fa-users fa-3x"></i>
                            </div>
                            <div class="col">
                                <h1 class="card-title"><span id="totalRegisteredUser"><!-- DITO NAGDIDISPLAY YUNG TOTAL --></span></h1>
                                <h6> Registered Users</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col">
                <div class="card mb-3 " style="width: 15rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <i class="far fa-solid fa-users fa-3x"></i>
                            </div>
                            <div class="col">
                                <h1 class="card-title"><span id="totalEmployees"><!-- DITO NAGDIDISPLAY YUNG TOTAL --></span></h1>
                                <h6> Employees</h6>
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
                    <h3>Top 5 Most Popular Project</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th># of likes</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Uploaded By</th>
                            </tr>
                        </thead>
                        <tbody id="popularProject">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-success post-feedback" data-id="">Post</button>
                            <button type="button" class="btn btn-sm btn-warning remove-feedback" data-id="">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>