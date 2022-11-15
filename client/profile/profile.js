$(document).ready(function () {

    $("#alertError").hide();
    $("#alertSuccess").hide();

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
            $("#schedAppProfile").hide();
            $("#viewAppModal").show();

        }
    });

}); // end of document ready function