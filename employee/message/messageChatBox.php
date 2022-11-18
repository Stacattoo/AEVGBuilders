<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();
$userData = $dbh->getAllClientInfoByID($_POST['id']);
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<div class="card mb-2">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h5 class="card-subtitle text-muted align-bottom m-0" id="clientID"hidden><?php echo $userData->id ?></h5>
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

                <div class="border" style="height: 320px; overflow-y:scroll; overflow-x:hidden;">
                    <div class="" id="messageRetrieve">
                        <div class="">
                            <small class="text-start" id="clientNameHeader"></small>
                            <div class="text-bg-secondary p-2 rounded-4" id="messageBubble"></div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <textarea class="form-control" aria-label="With textarea" id="contentID" name="employeeMessage"></textarea>
                    <button type="submit" class="btn btn-primary px-5 mt-3">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#messageBubble').hide();
        displayMessage();

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


        function displayMessage() {
            $.ajax({
                type: "POST",
                url: "../message/messageProcess.php",
                data: {
                    getMessage: true
                },
                dataType: "JSON",
                success: function(response) {
                    // $('#contentID').trigger("reset");
                    console.log(response);
                    var content = ``;
                    $.each(response.content, function(indexInArray, val) {
                        console.log(val);
                        var isEmployee = false;
                        if (val.sender == "employee") {
                            isEmployee = true;
                        }
                        content += `
                        <div class="mb-3 px-4 ">
                            <small>${val.sender}</small>
                            <div class="${(isEmployee) ? "text-bg-primary":"text-bg-secondary"} p-2 rounded-4">${val.content}</div>
                            <small>${val.dateTime}</small>
                        </div>
                    `;
                    });
                    $('#contentID').trigger("reset");
                    // $('#messageBubble').show();
                    $("#messageRetrieve").html(content);

                },
                error: function(response) {
                    console.error(response);
                }
            });
        }
    });
</script>