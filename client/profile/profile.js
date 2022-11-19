$(document).ready(function () {
    // $('[data-bs-toggle="tooltip"]').tooltip();
    $("#alertError").hide();
    $("#alertSuccess").hide();
    var feedbackContent = `
    <div>
        <h5><b>Thank you for trusting us!</b></h5>
        <p>We would like to hear your feedback.</p>
        <form id="feedbackForm">
            <div class="form-label">
                <textarea class="form-control" id="feedbackArea" rows="3"></textarea>
            </div>
            <div class="d-flex justify-content-end ">
                <button class="btn btn-secondary" type="submit">Submit</button>
            </div>
        </form>
    </div>`;

    var messageContent = 
    `<div class="modal-dialog ">
    <div class="modal-content modal-dialog-scrollable">
        <div class="modal-header">
            <h5 class="modal-title mb-3">AEVGBuilders</h5>
        </div>
        <div class="modal-body border" style="height: 200px; overflow-y:scroll; overflow-x:hidden;">
            <div class="position-absolute bottom-0 start-0 mx-3 mb-3" id="messageRetrieve">
                <div>
                    <small class="text-start" id="clientNameHeader"></small>
                    <div class="text-bg-secondary p-2 rounded-4" id="messageBubble"></div>
                </div>
            </div>
        </div>
        
        <textarea class="form-control" aria-label="With textarea" id="contentID" name="clientMessage"></textarea>
        <button type="submit" class="btn btn-secondary"><i class="fas fa-paper-plane"></i></button>
        
    </div>
</div>`;

    $("#fb").popover({
        placement:"left",
        html:true,
        sanitize:false,
        title: "Feedback",
        content:feedbackContent,
        
    });

    $("#msg").popover({
        placement:"left",
        html:true,
        sanitize:false,
        title: "Message",
        content:messageContent,
        
    });
    $("#fb").on("shown.bs.popover", function () {
        $("#feedbackForm").submit(function (e) { 
            e.preventDefault();
            console.log( $("#feedback").val());
            $.ajax({
                type: "POST",
                url: "profileProcess.php",
                data: {insertFeedback: $("#feedbackArea").val()},
                success: function (response) {
                    console.log(response);
                    alert("Feedback Successfully Sent!")
                }, error: function(response) {
                    console.error(response);
                }
            });
        });
    });
    $("#profileForm").submit(function (event) {
        // console.log('test lang');
        event.preventDefault();
        $.ajax({
            url: "profileProcess.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (result) {
                console.log(result);
                //alert("Record successfully updated");
                if (result.status == 'error') {
                    $("#alertError").html(result.msg);
                    $("#alertError").fadeIn();
                } else {
                    $("#alertSuccess").html(result.msg);
                    $("#alertSuccess").fadeIn();
                }
            },
            error: function (result) {
                console.error(result);
            }
        });
    });

    

    $('input').focus(function (e) {
        e.preventDefault();
        $("#alertError").fadeOut();
        $("#alertSuccess").fadeOut();

    });

    $('#imgBtn').change(function () {

        var file = $("input[type=file]").get(0).files[0];

        if (file) {

            var reader = new FileReader();

            reader.onload = function () {
                $("#profileImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }

    });

    $("#errorPass").hide();
    $("#changePassForm").hide();

    $("#profileInfo").click(function () {

        $(this).addClass("active");
        $("#passBtn").removeClass("active");
        $("#profileForm").show();
        $("#changePassForm").hide();

    });

    $("#passBtn").click(function () {

        $(this).addClass("active");
        $("#profileInfo").removeClass("active");
        $("#changePassForm").show();
        $("#profileForm").hide();

    });


    $("#changePassForm").submit(function (event) {
        // console.log('test lang');
        event.preventDefault();
        $.ajax({
            url: "changePassProcess.php",
            type: "POST",
            dataType: "json",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                console.log(result);
                if (result.status == "error") {
                    $("#errorPass").html(result.msg);
                    $("#errorPass").show();
                } else {
                    alert("Password Changed Succesfully");
                    $("#changePass").hide();
                    $("#errorPass").hide();
                    $('#changePassForm').trigger("reset");

                }

            }
        });
    });

    $('#changePassForm').click(function () {
        $("#errorPass").hide();
    });

    $("#schedAppProfile").show();
    $("#viewAppModal").hide();
    //     $("#scheduleForm").submit(function (event) {
    //         event.preventDefault();

    $.ajax({
        url: "../contactUs/getData.php",
        type: "POST",
        dataType: "json",
        data: {
            checkAppointmentProfile: true
        },
        success: function (result) {
            // console.log(result.status);
            if (result.status == 'pending') {
                $("#schedAppProfile").hide();
                $("#viewAppModal").show();
            } else if (result.status == 'canceled') {
                $("#schedAppProfile").show();
                $("#viewAppModal").hide();
            }

        }
    });

}); // end of document ready function