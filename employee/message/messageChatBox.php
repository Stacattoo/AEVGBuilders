<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();
$userData = $dbh->getAllClientInfoByID($_POST['id']);
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="../message/message.js"></script>
<div class="card mb-2">
    <div class="card-body">
        <div class="d-flex justify-content-between">

            <div class="dropdown m-0">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false" hidden>
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="edit" data-bs-toggle="modal" href="#editModal" data-id="<?php echo $userData->id; ?>">Edit</a></li>
                    <li><a class="dropdown-item" id="delete" data-bs-toggle="modal" href="#deleteModal" data-id="<?php echo $userData->id; ?>">Delete</a></li>
                </ul>
            </div>
        </div>
        <h5 class="text-capitalize mx-3 mt-3"><?php echo $userData->fullname; ?></h5>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form id="messageEmployee">
                <ul class="nav nav-pills nav-fill mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" id="messageTab">Message</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="filesTab">Files & Images</a>

                    </li>
                </ul>
                <input class="card-subtitle text-muted align-bottom m-0" name="clientID" id="clientID" value="<?php echo $userData->id ?>" hidden>
                <div class="border" id="scrollBar" style="height: 400px; overflow-y:scroll; overflow-x:hidden;">
                    <div class="" id="messageRetrieve">
                        <div class="">
                            <small class="text-start" id="clientNameHeader"></small>
                            <div class="text-bg-secondary p-2 rounded-4" id="messageBubble"></div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <textarea class="form-control" aria-label="With textarea" id="contentID" name="employeeMessage"></textarea>
                    <input type="file" class="btn" id="filesEmployee" name="filesEmployee[]" multiple>
                    <button type="submit" class="btn btn-primary px-5 mt-3">Send</button>
                    <div class="alert alert-danger mt-3" role="alert" id="errorFiles">
                        You can only upload a maximum of 5 files. Please Try again!
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#messageBubble').hide();
        $('#errorFiles').hide();
        displayMessage();
        // setInterval(displayMessage, 1000);
        $('#messageEmployee').submit(function(e) {

            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../message/messageProcess.php",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $('#messageEmployee').trigger("reset");
                    $('#filesEmployee').trigger("reset");
                    $('#contentID').html("");
                    if (response.status == 'success') {
                        displayMessage();
                    }
                },
                error: function(response) {
                    console.error(response.responseText);
                }
            });
        });


        $('#filesEmployee').change(function(e) {
            e.preventDefault();
            var $fileUpload = $("input[name='filesEmployee']");
            if (parseInt($fileUpload.get(0).files.length) > 5) {

                $('#errorFiles').show();
                $('#filesEmployee').trigger("reset");
            } else {
                $('#errorFiles').hide();
            }
        });

        function displayMessage() {
            var id = $('#clientID').val();

            $.ajax({
                type: "POST",
                url: "../message/messageProcess.php",
                data: {
                    getMessage: true,
                    id: id
                },
                dataType: "JSON",
                success: function(response) {

                    var content = ``;
                    console.log(response);
                    $.each(response.content, function(indexInArray, val) {
                        response.content.sort(function(a, b) {
                            return new Date(a.dateTime) - new Date(b.dateTime);
                        });

                        var isEmployee = false;
                        if (val.sender == "employee") {
                            isEmployee = true;
                        }
                        var contentMsgDisplay = '';
                        var imgArr = val.content.split(',');
                        for (let i in imgArr) {
                            contentMsgDisplay = imgArr[i];
                            // console.log(contentMsgDisplay);

                            var dotIndex = contentMsgDisplay.lastIndexOf('.');
                            var ext = contentMsgDisplay.substring(dotIndex);
                            console.log(ext);

                            if (contentMsgDisplay != ext) {
                                // console.log(contentMsgDisplay);
                                content += `
                                <div class="mb-3 px-4 ">
                                    <small>${val.sender}</small>
        
                                    <div class="${(isEmployee) ? "text-bg-primary":"text-bg-secondary"} p-2 rounded-4" >
                                    <img src="${contentMsgDisplay}" class="d-block img-fluid img" style="max-height: 150px;">
                                    </div>
                                    <small>${val.dateTime}</small>
                                </div>`;
                            } else {
                                // console.log("hinde image");
                                content += `
                            <div class="mb-3 px-4 ">
                                <small>${val.sender}</small>
    
                                <div class="${(isEmployee) ? "text-bg-primary":"text-bg-secondary"} p-2 rounded-4" >${contentMsgDisplay}</div>
                                <small>${val.dateTime}</small>
                            </div>
                        `;
                            }
                        }

                        // <img src="../projects/${data}" class="d-block img-fluid img">

                    });
                    $("#messageRetrieve").html(content);

                },
                error: function(response) {
                    console.error(response);
                }
            });
        }
    });
</script>