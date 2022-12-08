<?php
include("../include/dbh.admin.php");
$dbh = new dbHandler;
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<link rel="stylesheet" type="text/css" href="projects/app.css">
<script src="projects/preProject.js"></script>
<!-- <script src="projects/app.js"></script> -->

<div class="container-fluid">
    <div class="d-flex justify-content-between mx-4">

        <h3><i class="fal fa-city me-2"></i></i>Pre-Posted Projects</h3>
        <!-- <button type="button" class="btn btn-dark" data-bs-target="#newProjectModal" data-bs-toggle="modal">New Project</button> -->
    </div>
    <hr>
    <div class="container-fluid">
        <div class="container mt-5">
            <div id="preprojects" class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-4">
            </div>
        </div>

    </div>
</div>

<!-- Edit Project Modal -->
<div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="projectTitle">Edit Projects</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUploadProjects">
                <div class="modal-body">
                    <input type="hidden" id="hiddenId" name="hiddenId">
                    <div class="container text-center">
                        <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3" id="view-editImage">
                        </div>
                    </div>

                    <div class=" mt-5 mb-3 row">
                        <h5 class="col-sm-2 ">Project: &nbsp;</h5>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edit-title" name="titleEdit" placeholder="Title of Project" aria-label="title" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class=" mb-3 row">
                        <h5 class="col-sm-2 ">Category: &nbsp;</h5>
                        <div class="col-sm-10">

                            <select class="form-select" aria-label="Default select example" id="edit-category" name="categoryEdit">
                            <option selected disabled>Catergory</option>
                                <option value="Residentials">Residentials</option>
                                <option value="Commercial">Commercial</option>
                                <option value="Mixed-Use">Mixed-Use</option>
                                <option value="Institutional">Institutional</option>
                                <option value="Industrial">Industrial</option>
                                <option value="Interior">Interior</option>
                                <option value="Renovation">Renovation</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <h5 class="col-sm-2 ">Add Image: &nbsp;</h5>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="unset" name="imageEdit[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1" multiple>
                            <input type="hidden" id="edit-image" name="imageEditStore" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <h5 class="col-sm-2 ">Description: &nbsp;</h5>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="edit-description" name="descriptionEdit" placeholder="Description" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="alert alert-danger mt-3" role="alert" id="alertErrorEdit">
                    </div>
                    <div class="alert alert-success mt-3" role="alert" id="alertSuccessEdit">
                    </div>
                    <button type="button" class="btn  btn-outline-danger" id="deleteBtn" data-id="alertErrorEdit">Delete</a>
                        <button type="submit" class="btn  btn-outline-success " data-id="alertSuccessEdit">Save changes</button>
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>