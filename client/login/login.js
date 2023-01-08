-$(document).ready(function () {
    $("#alertError").hide();

    $('#loginForm').submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: 'client/login/loginProcess.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if (response.status == 'error') {
                    $("#alertError").html(response.msg);
                    $("#alertError").show();
                } else {
                    window.location.href = 'client/home/home.php';

                }
            }
        });
    });

    $('#loginForm').change(function(event) {
        $("#alertError").hide();
    });


    $("#alertErrorfp").hide();
    $("#alertSuccess").hide();
    $("#spinner").hide();
    $("#load").hide();
    $("#send").show();

    $('#forgotPassForm').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: 'client/login/forgotProcess.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function() {
                $("#spinner").show();
                $("#load").show();
                $("#send").hide();
                $("#forgotBtn").attr("disabled", "disabled");
            },
            success: function(response) {
                console.log(response);
                if (response.status == 'error') {
                    $("#spinner").hide();
                    $("#load").hide();
                    $("#send").show();
                    $("#forgotBtn").removeAttr('disabled');
                    $("#alertErrorfp").html(response.msg);
                    $("#alertErrorfp").show();
                } else {
                    $("#spinner").hide();
                    $("#load").hide();
                    $("#send").show();
                    $("#alertSuccess").html(response.msg);
                    $("#alertSuccess").show();
                }
            }, error: function (error) {
                console.error(error);
            }
        });
    });
    $('#forgotPassForm').change(function(event) {
        $("#alertErrorfp").hide();
        $("#alertSuccess").hide();
        
        
    });
});