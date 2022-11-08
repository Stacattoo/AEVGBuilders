<?php
include("../include/dbh.admin.php");
$dbh = new dbHandler;
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="materials/materials.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="materials/app.css"> -->
<!-- <script src="materials/app.js"></script> -->

<div class="container-fluid">
    <div class="d-flex justify-content-between mx-4">
        <h3><i class="fal fa-analytics me-2"></i>Upload Materials</h3>
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addNewMaterialsModal"><i class="fal fa-plus-circle"></i> Add Material</button>
    </div>
    <hr>
</div>

<div class="container-fluid">
        <div class="container mt-5">
            <div id="materialsList" class="row row-cols-2 row-cols-sm-2 row-cols-md-4 g-4">
            </div>
        </div>

    </div>

<!-- Modal -->
<div class="modal fade" id="addNewMaterialsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Add New Materials</h1> 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="uploadMaterials">
                <div class="modal-body">

                    <div class="row ">
                        <div class="mb-3 row">
                            
                            <h5 class="col-sm-2">Product Code: &nbsp;</h5>
                            <div class="col-sm-10">
                                <input type="text" class="col-sm-10 form-control" name="code" placeholder="Code" aria-label="code" aria-describedby="basic-addon1" required>
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <h5 class="col-sm-2">Product Name: &nbsp;</h5>
                            <div class="col-sm-10">
                                <input type="text" class="col-sm-10 form-control" name="name" placeholder="Name" aria-label="name" aria-describedby="basic-addon1" required>
                            </div>

                        </div>
                            <div class="mb-3 row">
                                <h5 class="col-sm-2">Product Category: &nbsp;</h5>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="category" required>
                                        <option selected>Catergory</option>
                                        <option value="Concrete">Concrete</option>
                                        <option value="Cement">Cement</option>
                                        <option value="Nails">Nails</option>
                                        <option value="Ply wood">Ply wood</option>
                                    </select>
                                </div>
                            </div>

                        <div class="mb-3 row">
                            <h5 class="col-sm-2">Product Image: &nbsp;</h5>
                            <div class="col-sm-10">
                                <input type="file" class="col-sm-10 form-control" name="image" placeholder="image" aria-label="image" aria-describedby="basic-addon1" required>
                            
                            </div>
                        </div>
                        <div class="mb-3 row">

                            <h5 class="col-sm-2">Product Description: &nbsp;</h5>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" placeholder="Description" aria-label="With textarea"></textarea>
                                
                            </div>
                           
                            
                        </div>
                            
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="alert alert-danger mt-3" role="alert" id="alertError">
                    </div>
                    <div class="alert alert-success mt-3" role="alert" id="alertSuccess">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-dark">Upload Material</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

 <!-- View materials -->
<div class="modal fade" id="viewMaterialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="projectTitle">View Materials</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="Materials">
                <div class="modal-body">
                    <input type="hidden" id="hiddenId" name="hiddenId">
                    <div class="container text-center">
                        <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3" id="view-editImage">
                        </div>
                    </div>

                    <div class=" mt-5 mb-3 row">
                        <h5 class="col-sm-2 ">Code: &nbsp;</h5>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edit-title" name="titleEdit" placeholder="Title of Project" aria-label="title" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <h5 class="col-sm-2 ">Name:  &nbsp;</h5>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="edit-title" name="titleEdit" placeholder="Title of Project" aria-label="title" aria-describedby="basic-addon1">

                        </div>
                    </div>
                    <div class=" mb-3 row">
                        <h5 class="col-sm-2 ">Category: &nbsp;</h5>
                        <div class="col-sm-10">

                            <select class="form-select" aria-label="Default select example" id="edit-category" name="categoryEdit">
                                <option selected disabled>Catergory</option>
                                <option value="Concrete">Concrete</option>
                                <option value="Cement">Cement</option>
                                <option value="Nails">Nails</option>
                                <option value="Ply wood">Plywood</option>
                            </select>
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
                    <button type="button" class="btn  btn-outline-danger " id="deleteBtn" data-id="alertErrorEdit">Delete</button>
                        <button type="button" class="btn  btn-outline-success " data-id="alertSuccessEdit">Save changes</button>
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>