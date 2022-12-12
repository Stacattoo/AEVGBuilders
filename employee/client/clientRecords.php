<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();

$userData = $dbh->getAllClientInfoByID($_POST['id']);
$pendingUserData = $dbh->getClientScheduleDetails($_POST['id']);
// $status = $dbh->getStatus($_POST['clientid']);
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<div class="card mb-2  rounded-5">
    <div class="card-body text-white rounded-3" style="background-color:#343a40;">
        <div class="d-flex justify-content-between">
            <h2 class="text-capitalize text-bold mt-3"><?php echo $userData->fullname; ?></h2>
            <h3 class="card-subtitle text-muted align-bottom m-0" id="idClient" hidden><?php echo $userData->id ?></h3>
            <!-- <div class="d-flex flex-row-reverse">
                <button class=" border-0  btn btn-outline-light" data-bs-toggle="modal" type="button" id="delete" href="#deleteModal" data-id="<?php echo $userData->id; ?>">
                    <i class="fas fa-trash fs-5"></i>
                </button>
                <button class="border-0  btn btn-outline-light" data-bs-toggle="modal" type="button" id="edit" href="#editModal" data-id="<?php echo $userData->id; ?>">
                    <i class="fas fa-edit fs-5"></i>
                </button>
            </div> -->

        </div>

        <div class="row">
            <div class="col-8">
                <div>Email Address: <a href="mailto:<?php echo $userData->email; ?>" class="fw-bolder text-light"><?php echo $userData->email; ?></a></div>
                <div>Contact Number: <span class="fw-bolder"><?php echo $userData->contactNo; ?></span></div>
                <div>Address: <span class="fw-bolder text-capitalize"><?php echo $userData->address; ?></span></div>
            </div>

            <?php if ($userData->status != '' && $pendingUserData->status != '') {
            ?>
                <div class="col-4">
                    <div >Client Status: <strong id="statusId"><?php echo $userData->status; ?></strong></div> <!-- dito yung status grr -->
                    <div>Change Status:
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" id="ongoing" value="ongoing" href="#">Ongoing</a></li>
                            <li><a class="dropdown-item" id="onhold" value="onhold" href="#">Onhold</a></li>
                            <li><a class="dropdown-item" id="stop" value="stop" href="#">Stopped</a></li>
                            <li><a class="dropdown-item" id="finish" value="finish" href="#">Finished</a></li>
                        </ul>
                            </button>
                            <ul class="dropdown-menu">
                                <li><button type="button" class="dropdown-item statusBtn" data-status="Ongoing">Ongoing</button></li>
                                <li><button type="button" class="dropdown-item statusBtn" data-status="Onhold">Onhold</button></li>
                                <li><button type="button" class="dropdown-item statusBtn" data-status="Stopped">Stopped</button></li>
                                <li><button type="button" class="dropdown-item statusBtn" data-status="Finished">Finished</button></li>
                            </ul>

                        </div>

                    </div>

                </div>
            <?php
            }
            ?>

        </div>


        <!-- TODO: fix names, hindi similar pag cinlick
                    lalagyan ng condition na palitan yung name-->
        <div><span class="fw-bolder">
                <?php if ($userData->employeeName == "") {
                    echo '<button class="btn btn-primary" id="acceptClientBtn" type="button">Assign To Me</button>';
                } else {
                    echo 'Assigned Employee: ' . $userData->employeeName;
                } ?></span></div>
    </div>
</div>
<div class="card">

    <div class="card-body" style="background-color:#f8f9fa;">

        <h4 class="text-capitalize text-bold mx-5 mt-2">Appointment Details</h4>

        <div class="modal-body p-5">
            <div class="row g-3">
                <div class="col">
                    <h5><b>Name: </b></h5>
                    <p class="form-control" value="" id="name_id"></p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-sm-6">
                    <h5><b>Email Address: </b></h5>
                    <p class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="email_id">

                </div>
                <div class="col-sm-6">
                    <h5><b>Contact Number: </b></h5>
                    <p class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="contact_id" readonly>

                </div>
            </div>
            <div class="row g-3">
                <div class="col-sm-6">
                    <h5><b>Project Type: </b></h5>
                    <p class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="projType_id" readonly>


                </div>
                <div class="col-sm-6">
                    <h5><b>Nature of Business: </b></h5>
                    <p class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="business_id" readonly>

                </div>
            </div>
            <div class="row g-3">
                <div class="col-sm-9">
                    <h5><b>Project Location: </b></h5>
                    <p class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="projLoc_id" readonly>

                </div>
                <div class="col-sm-3">
                    <h5><b>Lot Area: </b></h5>
                    <p class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="lotArea_id" readonly>

                </div>
            </div>
            <div class="row g-3">
                <div class="col-sm-6">
                    <h5><b>Number of Building Storey: </b></h5>
                    <p class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="numStorey_id" readonly>


                </div>
                <div class="col-sm-6">
                    <h5><b>Target Construction Date: </b></h5>
                    <p class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="targetCons_id" readonly>


                </div>
            </div>
            <div class="row g-3">
                <div class="col-sm-6">
                    <h5><b>Meeting Type: </b></h5>
                    <p class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="meetType_id" readonly>

                </div>
                <div class="col-sm-6">
                    <h5><b>Meeting Location:</b></h5>
                    <p class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="meetLoc_id" readonly>

                </div>
            </div>
            <div class="row g-3">
                <div class="col-sm-6">
                    <h5><b>Meeting Date:</b></h5>
                    <p class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="meetDate_id" readonly>

                </div>
                <div class="col-sm-6">
                    <h5><b>Meeting Time:</b></h5>
                    <p class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" id="meetTime_id" readonly>

                </div>

            </div>
            <div class="row g-3">
                <div class="col-sm-6">
                    <h5><b>Reference Image/s:</b></h5>
                    <div class="form-control" id="refImgClient"></div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- EDIT Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm">

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="1234" required>
                        <label for="firstName">First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="middleName" name="middleName" placeholder="1234">
                        <label for="middleName">Middle Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="1234" required>
                        <label for="lastName">Last Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="1234" email required>
                        <label for="email">Emaill Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="1234" required>
                        <label for="contact">Contact Number</label>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- choose modal -->
<div class="modal fade" id="chooseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h1 class="modal-title fs-5" id="exampleModalLabel">Choose Employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="table" class="table table-sm table-hover">
                    <thead>
                        <tr id="first-tr">
                            <th>Select</th>
                            <th>ID</th>
                            <th>Employee Name</th>
                        </tr>
                    </thead>
                    <tbody id="chooseEmployee">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="chooseBtn" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="../client/client.js"></script>


<script>
    $(document).ready(function() {
        console.log("call");
        displayDetails();

        $.ajax({
            type: "POST",
            url: "../client/clientProcess.php",
            data: {
                getEmployee: true
            },
            dataType: "JSON",
            success: function(response) {
                // console.log(response);
                var content = ``;
                $.each(response, function(i, val) {
                    //  console.log(val.id);
                    content += `
                    <tr>
                            <td><input type="radio" id="empChoose" value="${val.id}" name="select"></td>
                            <td>${val.id}</td>
                            <td>${val.fullName}</td>
                            

                        </tr>
                    `;
                });
                // console.log(content);
                $('#chooseEmployee').html(content);

                $('#table tr').click(function() {

                    $(this).find('td input:radio').prop('checked', true);
                    $('#table tr').removeClass("table-primary");
                    $(this).addClass("table-primary");
                })
            }
        });
        $("#acceptClientBtn").click(function(e) {
            // var clientDiv = (this).html();

            e.preventDefault();
            var clientID = $('#idClient').html();

            $.ajax({
                type: "POST",
                url: "../client/clientProcess.php",
                data: {
                    accept_client: true,
                    clientID: clientID
                },
                dataType: "JSON",
                success: function(response) {

                    if (response.status == 'success') {
                        console.log("dsplay");
                        displayApproveClient();
                        displayPendingClient();
                        $('#chooseModal').modal("hide");
                        location.reload(); //RELOAD NG PAGE

                    }

                },
                error: function(response) {
                    console.error(response);
                }
            });
        });



        $("#errorAlert").hide();
        $("#edit").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $("#errorAlert").hide();
            $.ajax({
                type: "POST",
                url: "../client/clientProcess.php",
                data: {
                    editUser: id
                },
                dataType: 'JSON',
                success: function(response) {
                    $("#id").val(response.id);
                    $("#studentno").val(response.studentno);
                    $("#firstName").val(response.firstName);
                    $("#middleName").val(response.middleName);
                    $("#lastName").val(response.lastName);
                    $("#email").val(response.email);
                    $("#contact").val(response.contact);
                    $("#strand").val(response.strand);
                },
                complete: function() {
                    $("#editModal").modal("show");
                }
            });

        });

        $("#editForm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '../client/clientProcess.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response) {
                        $.getScript("students/students.js", function(script) {
                            $("#editForm").trigger('reset');
                            $("#editModal").modal('hide');
                            displayUsers();
                        });
                    } else {
                        $("#errorAlert").show();
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        $("#delete").click(function(e) {
            e.preventDefault();
            if (confirm("Are you sure you want to delete this user?")) {
                var id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "../client/clientProcess.php",
                    data: {
                        deleteUser: id
                    },
                    success: function(response) {
                        if (response) {
                            $.getScript("../client/client.js", function(script) {
                                displayUsers();
                            });
                        }
                    }
                });
            }
        });

        function displayDetails() {
            $(document).ready(function() {
                var id = $('#idClient').html();
                $.ajax({
                    type: "post",
                    url: "../client/getData.php",
                    data: {
                        client_id: id,
                        displaySchedDetails: true
                    },
                    dataType: 'JSON',
                    success: function(details) {

                        var location = details.meetLoc;
                        if (details.meetLoc == '') {
                            details.meetLoc = "N/A";
                        }
                        var businessVar = '';
                        var imgAppDetails = ``;
                        $.each(details.businessType, function(indexInArray, data) {
                            businessVar = details.businessType.join(', ');
                        });
                        $.each(details.image, function(indexInArray, data) {
                            // imgAppDetails = data;
                            if (data == '') {
                                imgAppDetails = `
                            <div class="col">
                                    <div class="border position-relative" style="height: 300px;">
                                        
                                    <p class="position-absolute top-50 start-50 translate-middle">No Image reference.</p>
                                    </div>
                                </div>
                            `;
                            } else {
                                imgAppDetails += `
                                <div class="col">
                                    <div class="border position-relative">
                                        <img src="../projects/${data}" class="d-block img-fluid img">
                                        <span class="deleteImgBtn position-absolute top-0 start-100 translate-middle"
                                            id="imageDeleteBtn"  data-id="${indexInArray}">
                                            -
                                        </span>
                                    </div>
                                </div>
                            `;
                            }
                        });

                        $('#editBtnID').attr("data-id", details.client_id);
                        $('#name_id').html(details.fullName);
                        $('#contact_id').html(details.contactNo);
                        $('#email_id').html(details.email);
                        $('#projLoc_id').html(details.projLocation);
                        $('#targetCons_id').html(details.targetDate);
                        $('#projType_id').html(details.projectType);
                        $('#lotArea_id').html(details.lotArea);
                        $('#numStorey_id').html(details.noFloors);
                        $('#business_id').html(businessVar);
                        $('#meetType_id').html(details.meetType);
                        $('#meetLoc_id').html(details.meetLoc);
                        $('#meetDate_id').html(details.appointmentDate);
                        $('#meetTime_id').html(details.appointmentTime);
                        $('#refImgClient').html(imgAppDetails);
                        valueEdit = details;

                    },
                    error: function(details) {
                        console.log(details);
                    }
                });
            });

        }

        //
    });
</script>