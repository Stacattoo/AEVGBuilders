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
        <form id="uploadProjects">
            <div class="input-group mb-3 mt-5">
                <h5>Title of Project: &nbsp;</h4><input type="text" class="" name="title" placeholder="Title of Project" aria-label="title" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <h5>Product Category: &nbsp;</h4><select class="" aria-label="Default select example" name="category" required>
                        <option selected>Catergory</option>
                        <option value="Interior">Interior</option>
                        <option value="Renovate">Renovate</option>
                        <option value="Bungalo">Bungalo</option>
                        <option value="Modern">Modern</option>
                    </select>
            </div>
            <div class="input-group mb-3">
                <h5>Product Image: &nbsp;</h4><input type="file" class="" name="image" placeholder="image" aria-label="image" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <h5>Product Description: &nbsp;</h4><textarea class="" name="description" placeholder="Description" aria-label="With textarea"></textarea>
            </div>

            <div class="alert alert-danger mt-3" role="alert" id="alertError">
            </div>
            <div class="alert alert-success mt-3" role="alert" id="alertSuccess">
            </div>

            <button type="submit" class="btn btn-dark">Upload Product</button>
        </form>
    </div>

</div>