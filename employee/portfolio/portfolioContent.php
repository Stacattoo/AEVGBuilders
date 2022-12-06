<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();
$userData = $dbh->getAllClientInfoByID($_POST['id']);
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="../portfolio/portfolio.js"></script>
<script src="../portfolio/app.js"></script>

<link rel="stylesheet" type="text/css" href="../portfolio/app.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="card" style="background-color:#f8f9fa;">
    <div class="card-body h-100">
        <div class="d-flex justify-content-between">
            <h5 class="text-capitalize mx-3 mt-1"><?php echo $userData->fullname; ?></h5>
            <button type="button" class="btn btn-black" data-bs-target="#newProjectModal" data-bs-toggle="modal">Upload Portfolio</button>
        </div>
        <div class="container-fluid">
            <div class=" mt-5">
                <div id="projects" class="row row-cols-2 row-cols-sm-2 row-cols-md-4 g-4">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- button add new project -->
<div class="modal fade" id="newProjectModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Add New Project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="uploadProjects">
                <input class="card-subtitle text-muted align-bottom m-0" name="clientID" id="clientID" value="<?php echo $userData->id; ?>" hidden>
                <div class="modal-body">

                    <div class="row ">
                        <div class="mb-3 row">

                            <h5 class="col-sm-2 ">Title: &nbsp;</h5>
                            <div class="col-sm-10">

                                <input type="text" class="col-sm-10 form-control " name="title" placeholder="Title of Project" aria-label="title" aria-describedby="basic-addon1" required>


                            </div>
                        </div>
                        <div class="mb-3 row">
                            <h5 class="col-sm-2 "> Description: &nbsp;</h5>
                            <div class="col-sm-10">
                                <textarea class="form-control " name="description" placeholder="Description" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <h5 class="col-sm-2 ">Image: &nbsp;</h5>
                            <div class="col-sm-10">


                                <!-- <input type="file" id="imgBtn" class="form-control" name="image[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1" multiple required> -->
                                <div class="card-file" id="uploadReset">
                                    <div class="drag-area">
                                        <span class="visible">
                                            Drag & drop image here or
                                            <span class="select" role="button">Browse</span>
                                        </span>
                                        <span class="on-drop">Drop images here</span>
                                        <input type="file" id="imgBtn" class="form-control" name="image[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1" multiple require>
                                    </div>

                                    <!-- IMAGE PREVIEW CONTAINER -->
                                    <div class="container " id="imgCon"></div>
                                </div>
                                <div class="alert alert-danger mt-3" role="alert" id="alertError">
                                </div>
                                <div class="alert alert-success mt-3" role="alert" id="alertSuccess">
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <div class="text-end">
                        <button type="submit" class="btn btn-dark">Upload Project</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 
<!-- upload of edit modal -->
<!-- Edit Project Modal -->
<div class="Editmodal fade" id="editProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    
                    <div class="mb-3 row">
                        <h5 class="col-sm-2 ">Add Image: &nbsp;</h5>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="unset" name="imageEdit[]" placeholder="image" aria-label="image" aria-describedby="basic-addon1" multiple require>
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
                    <button type="button" class="btn  btn-outline-danger" id="deleteBtn" data-id="alertErrorEdit">Delete</button>
                    <button type="submit" class="btn  btn-outline-success " data-id="alertSuccessEdit">Save changes</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#alertError').hide();
        $('#alertSuccess').hide();
    });
</script>