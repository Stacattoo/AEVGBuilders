<?php
include("../include/dbh.admin.php");
$dbh = new dbHandler;
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="../materials/materials.js"></script>
<div class="container-fluid">
    <h3><i class="fal fa-analytics me-2"></i>Upload Materials</h3>
    <hr>
    <div class="container-fluid">
        <form id="uploadMaterials">
            <div class="input-group mb-3 mt-5">
                <h5>Product Code: &nbsp;</h4><input type="text" class="" name="code" placeholder="Code" aria-label="code" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <h5>Product Name: &nbsp;</h4><input type="text" class="" name="name" placeholder="Name" aria-label="name" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <h5>Product Category: &nbsp;</h4><select class="" aria-label="Default select example" name="category" required>
                        <option selected>Catergory</option>
                        <option value="Concrete">Concrete</option>
                        <option value="Cement">Cement</option>
                        <option value="Nails">Nails</option>
                        <option value="Ply wood">Ply wood</option>
                    </select>
            </div>
            <div class="input-group mb-3">
                <h5>Product Image: &nbsp;</h4><input type="file" class="" name="image" placeholder="image" aria-label="image" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <h5>Product Description: &nbsp;</h4><textarea class="" name="description" placeholder="Description" aria-label="With textarea"></textarea>
            </div>
            <div class="input-group mb-3">
                <h5>Product Stock: &nbsp;</h4><input type="number" class="" name="stock" placeholder="Number of stock" aria-label="stock" aria-describedby="basic-addon1" required>
            </div>

            <div class="alert alert-danger mt-3" role="alert" id="alertError">
            </div>
            <div class="alert alert-success mt-3" role="alert" id="alertSuccess">
            </div>

            <button type="submit" class="btn btn-dark" >Upload Product</button>
        </form>
    </div>

</div>

<!-- <script>
    $(document).ready(function() {
        $.post("schedule/scheduleFunctions.php", {
                getStudentNo: true
            },
            // function(data) {
            //     $("#studentNoList").html(data);
            // }
        );
    });

</script> -->