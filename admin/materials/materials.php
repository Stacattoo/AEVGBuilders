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
    <div class="container-fluid">
        <div class="row justify-content-md">
            <div class="col-md-auto">
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
                        <h5>Product Image: &nbsp;</h4>
                            <input type="file" class="" name="image" placeholder="image" aria-label="image" aria-describedby="basic-addon1" required>
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
                        <h5>Product Description: &nbsp;</h4><textarea class="" name="description" placeholder="Description" aria-label="With textarea"></textarea>
                    </div>
                    <!-- <div class="input-group mb-3">
                        <h5>Product Stock: &nbsp;</h4><input type="number" class="" name="stock" placeholder="Number of stock" aria-label="stock" aria-describedby="basic-addon1" required>
                    </div> -->

                    <div class="alert alert-danger mt-3" role="alert" id="alertError">
                    </div>
                    <div class="alert alert-success mt-3" role="alert" id="alertSuccess">
                    </div>

                    <button type="submit" class="btn btn-dark">Upload Product</button>
                </form>
            </div>
        </div>
    </div>

    <table id="table" class="table table-sm table-hover">
        <thead>
            <tr id="first-tr">
                <th>Select</th>
                <th>Code</th>
                <th>NAME</th>
                <th>CATEGORY</th>
                <th>DESCRIPTION</th>
            </tr>
        </thead>
        <tbody id="materialsList">

        </tbody>
    </table>

    <!-- <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">CODE</th>
                <th scope="col">NAME</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">DESCRIPTION</th>
            </tr>
        </thead>
        <tbody class = "table-hover">
            <tr>
                <th scope="row">6363</th>
                <td>Sementoaur</td>
                <td>Cement</td>
                <td>sementaur naur!~</td>
            </tr>
            <tr>
                <th scope="row">0203</th>
                <td>Nail</td>
                <td>Nails</td>
                <td>Purr</td>
            </tr>
            <tr>
                <th scope="row">sampleCode</th>
                <td>sampleName</td>
                <td>Concrete</td>
                <td>asd</td>
            </tr>
            <tr>
                <th scope="row">hannaSample</th>
                <td>Hanna Sagun</td>
                <td>Concrete</td>
                <td>asdasd</td>
            </tr>
            <tr>
                <th scope="row">sheesh</th>
                <td>asda</td>
                <td>Nails</td>
                <td>aaaaaafsdfnooooo</td>
            </tr>
        </tbody>
    </table> -->
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            
            type: "POST",
            url: "materials/materialsProcess.php",
            data: {
                displayMaterials: true
            },
            dataType: "JSON",
            success: function(response) {
                console.log("asd");
                var content = ``;
                $.each(response, function(i, val) {
                     console.log(val.id);
                    content += `
                    <tr>
                            <td><input type="radio" id="matChoose" value="${val.id}" name="select"></td>
                            <td>${val.code}</td>
                            <td>${val.name}</td>
                            <td>${val.category}</td>
                            <td>${val.description}</td>
                        </tr>
                    `;
                });
                console.log(content);
                $('#materialsList').html(content);

                $('#table tr').click(function() {

                    $(this).find('td input:radio').prop('checked', true);
                    $('#table tr').removeClass("table-primary");
                    $(this).addClass("table-primary");
                })
            }
        });

    });
</script>