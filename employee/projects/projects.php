<?php
include("../include/dbh.employee.php");
$dbh = new dbHandler;
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="../projects/projects.js"></script>

<div class="container-fluid">
    <h3><i class="fal fa-analytics me-2"></i>Upload Project</h3>
    <hr>
    <div class="container-fluid">

        <div class="row">

            <div class="col-4">
                <form id="uploadProjects">
                    <div class="input-group mb-3 mt-5">
                        <h5>Title of Project: &nbsp;</h4><input type="text" class="" name="title" placeholder="Title of Project" aria-label="title" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <h5>Product Category: &nbsp;</h4>
                            <select class="" aria-label="Default select example" name="category" required>
                                <option selected>Catergory</option>
                                <option value="Interior">Interior</option>
                                <option value="Renovate">Renovate</option>
                                <option value="Bungalo">Bungalo</option>
                                <option value="Modern">Modern</option>
                            </select>
                    </div>
                    <div class="input-group mb-3">
                        <h5>Product Image: &nbsp;</h4><input type="file" id="imgBtn" class="" name="image[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1" multiple required>
                    </div>
                    <div class="input-group mb-3">
                        <h5>Product Description: &nbsp;</h4><textarea class="" name="description" placeholder="Description" aria-label="With textarea"></textarea>
                    </div>

                    <div class="alert alert-danger mt-3" role="alert" id="alertError">
                    </div>
                    <div class="alert alert-success mt-3" role="alert" id="alertSuccess">
                    </div>

                    <button type="submit" class="btn btn-dark">Upload Project</button>
                </form>
            </div>
            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image Path</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody  id="projects">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- Edit Project Modal -->
<div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="projectTitle">Edit Projects</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUploadProjects">
                    <div class="input-group mb-3 mt-5">
                        <h5>Title of Project: &nbsp;</h4><input type="text" class="" id="edit-title" name="title" placeholder="Title of Project" aria-label="title" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <h5>Product Category: &nbsp;</h4>
                            <select class="" aria-label="Default select example" id="edit-category" name="category" required>
                                <option selected>Catergory</option>
                                <option value="Interior">Interior</option>
                                <option value="Renovate">Renovate</option>
                                <option value="Bungalo">Bungalo</option>
                                <option value="Modern">Modern</option>
                            </select>
                    </div>
                    <div class="input-group mb-3">
                        <h5>Product Image: &nbsp;</h4><input type="file" id="edit-image" class="" name="image[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1" multiple required>
                    </div>
                    <div class="input-group mb-3">
                        <h5>Product Description: &nbsp;</h4><textarea class="" id="edit-description" name="description" placeholder="Description" aria-label="With textarea"></textarea>
                    </div>

                    <div class="alert alert-danger mt-3" role="alert" id="alertError">
                    </div>
                    <div class="alert alert-success mt-3" role="alert" id="alertSuccess">
                    </div>

                    <button type="submit" class="btn btn-dark">Edit Project</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>