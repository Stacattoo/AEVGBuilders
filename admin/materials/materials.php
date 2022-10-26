<?php
include("../include/dbh.admin.php");
$dbh = new dbHandler;
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="materials/materials.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="materials/app.css"> -->
<!-- <script src="materials/app.js"></script> -->

<div class="container-fluid">
    <h3><i class="fal fa-analytics me-2"></i>Upload Materials</h3>
    <hr>
    <form id="uploadMaterials" class="mb-5">
        <div class="row ">
            <div class="col">
                <div class="input-group mb-3">
                    <h5>Product Code: &nbsp;</h5>
                    <input type="text" class="form-control" name="code" placeholder="Code" aria-label="code" aria-describedby="basic-addon1" required>
                </div>
                <div class="input-group mb-3">
                    <h5>Product Name: &nbsp;</h5>
                    <input type="text" class="form-control" name="name" placeholder="Name" aria-label="name" aria-describedby="basic-addon1" required>
                </div>
                <div class="input-group mb-3">
                    <h5>Product Category: &nbsp;</h5>
                    <select class="form-select" aria-label="Default select example" name="category" required>
                        <option selected>Catergory</option>
                        <option value="Concrete">Concrete</option>
                        <option value="Cement">Cement</option>
                        <option value="Nails">Nails</option>
                        <option value="Ply wood">Ply wood</option>
                    </select>
                </div>

            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <h5>Product Image: &nbsp;</h5>
                    <input type="file" class="form-control" name="image" placeholder="image" aria-label="image" aria-describedby="basic-addon1" required>
                    <!-- <div class="card" name="image" id="uploadReset">
                                <div class="drag-area">
                                    <span class="visible">
                                        Drag & drop image here or
                                        <span class="select" role="button">Browse</span>
                                    </span>
                                    <span class="on-drop">Drop images here</span>
                                    <input type="file" id="imgBtn" class="form-control" name="image[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1">
                                </div>


                                <div class="container" id="imgCon"></div>

                            </div> -->
                </div>
                <div class="input-group mb-3">
                    <h5>Product Description: &nbsp;</h5><textarea class="form-control" name="description" placeholder="Description" aria-label="With textarea"></textarea>
                </div>
                <!-- <div class="input-group mb-3">
                        <h5>Product Stock: &nbsp;</h4><input type="number" class="" name="stock" placeholder="Number of stock" aria-label="stock" aria-describedby="basic-addon1" required>
                    </div> -->

                <div class="alert alert-danger mt-3" role="alert" id="alertError">
                </div>
                <div class="alert alert-success mt-3" role="alert" id="alertSuccess">
                </div>

                <button type="submit" class="btn btn-dark">Upload Product</button>
            </div>
        </div>

    </form>


    <table id="table" class="table table-sm table-hover">
        <thead>
            <tr id="first-tr">

                <th>ID</th>
                <th>Code</th>
                <th>NAME</th>
                <th>CATEGORY</th>
                <th>DESCRIPTION</th>
            </tr>
        </thead>
        <tbody id="materialsList">

        </tbody>
    </table>

</div>

<!-- Modal -->
<div class="modal fade" id="editMaterialsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="materialTitle">Material Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editUploadMaterials">
                <div class="modal-body">
                    <input type="hidden" id="hiddenId" name="hiddenId">
                    <div class="container text-center">
                        <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3" id="view-editMats">
                        </div>
                    </div>

                    <div class="input-group mb-3 mt-5 row">
                        <h5 class="col-sm-2 ">Material Code &nbsp;</h5>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edit-title" name="titleEdit" placeholder="Title of Project" aria-label="title" aria-describedby="basic-addon1">
                        </div>
                        <!-- code should not editable -->
                    </div>
                    <div class="input-group mb-3 row">
                        <h5 class="col-sm-2 ">Materials Category: &nbsp;</h5>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="edit-category" name="categoryEdit">
                                <option selected disabled>Catergory</option>
                                <option value="Interior">Interior</option>
                                <option value="Renovate">Renovate</option>
                                <option value="Bungalo">Bungalo</option>
                                <option value="Modern">Modern</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">

                        <h5 class="col-sm-2 ">Add Image: &nbsp;</h4>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="unset" name="imageEdit[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1" multiple>
                                <input type="hidden" id="edit-image" name="imageEditStore" value="">
                            </div>
                    </div>
                    <div class="input-group mb-3 row">
                        <h5 class="col-sm-2 ">Material Description: &nbsp;</h5>
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
                    <button type="button" class="btn  btn-outline-danger" id="deleteBtn">Delete</a>
                        <button type="submit" class="btn  btn-outline-success ">Save changes</button>
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>