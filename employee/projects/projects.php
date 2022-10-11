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
<!-- Edit Project Modal -->
<div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="projectTitle">Edit Projects</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUploadProjects">
                    <input type="hidden" id="hiddenId" name="hiddenId">
                    <div class="container text-center">
                        <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3" id="view-editImage">
                        </div>
                    </div>
                    <div class="input-group mb-3 mt-5">
                        <h5>Title of Project: &nbsp;</h5><input type="text" class="form-control" id="edit-title" name="titleEdit" placeholder="Title of Project" aria-label="title" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <h5>Product Category: &nbsp;</h4>
                            <select class="form-control" aria-label="Default select example" id="edit-category" name="categoryEdit">
                                <option selected>Catergory</option>
                                <option value="Interior">Interior</option>
                                <option value="Renovate">Renovate</option>
                                <option value="Bungalo">Bungalo</option>
                                <option value="Modern">Modern</option>
                            </select>
                    </div>
                    <div class="input-group mb-3">
                        
                    <h5>Add Image: &nbsp;</h4><input type="file" class="form-control" id="unset" name="imageEdit[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1" multiple>
                       <input type="hidden" id="edit-image" name="imageEditStore" value="">
                    </div>
                    <div class="input-group mb-3">
                        <h5>Product Description: &nbsp;</h4><textarea class="form-control" id="edit-description" name="descriptionEdit" placeholder="Description" aria-label="With textarea"></textarea>
                    </div>

                    <div class="alert alert-danger mt-3" role="alert" id="alertErrorEdit">
                    </div>
                    <div class="alert alert-success mt-3" role="alert" id="alertSuccessEdit">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-dark">Save Changes</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alert" id="deleteBtn" data-id="">Delete</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>