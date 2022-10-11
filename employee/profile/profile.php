<?php
include("../include/dbh.employee.php");
$dbh = new dbHandler;
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<link rel="stylesheet" type="text/css" href="../projects/app.css">
<script src="../projects/projects.js"></script>
<script src="../projects/app.js"></script>

<div class="container-fluid">
    <h3><i class="fal fa-analytics me-2"></i>Upload Project</h3>
    <hr>
    <div class="container-fluid">

        <div class="row">

            <div class="col-4">
                <form id="uploadProjects">
                    <div class="input-group mb-3 mt-5">
                        <h5>Title of Project: &nbsp;</h4><input type="text" class="form-control" name="title" placeholder="Title of Project" aria-label="title" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <h5>Product Category: &nbsp;</h4>
                            <select class="form-control" aria-label="Default select example" name="category" required>
                                <option selected>Catergory</option>
                                <option value="Interior">Interior</option>
                                <option value="Renovate">Renovate</option>
                                <option value="Bungalo">Bungalo</option>
                                <option value="Modern">Modern</option>
                            </select>
                    </div>
                    <div class="input-group mb-3">
                        <h5>Product Image: &nbsp;</h4>
                            <!-- <input type="file" id="imgBtn" class="form-control" name="image[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1" multiple required> -->
                            <div class="card" id="uploadReset">
                                <div class="drag-area">
                                    <span class="visible">
                                        Drag & drop image here or
                                        <span class="select" role="button">Browse</span>
                                    </span>
                                    <span class="on-drop">Drop images here</span>
                                    <input type="file" id="imgBtn" class="form-control" name="image[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1" multiple>
                                </div>

                                <!-- IMAGE PREVIEW CONTAINER -->
                                <div class="container" id="imgCon"></div>
                                
                            </div>
                    </div>
                    <div class="input-group mb-3">
                        <h5>Product Description: &nbsp;</h4><textarea class="form-control" name="description" placeholder="Description" aria-label="With textarea"></textarea>
                    </div>

                    <div class="alert alert-danger mt-3" role="alert" id="alertError">
                    </div>
                    <div class="alert alert-success mt-3" role="alert" id="alertSuccess">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-dark">Upload Project</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody id="projects">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
