-$(document).ready(function () {
    $("#alertError").hide();

    $("#fPSpinner").hide();
    $("#successAlertFP").hide();

    $('#forgotPasswordModal').on('show.bs.modal', function (e) {
        $("#errorAlertFP").hide();
        $("#successAlertFP").hide();
        $("#forgotPasswordForm").trigger("reset");
    })

    $('#loginForm').submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: 'loginProcess.php',
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
                    window.location.href = '../home/home.php';
                }
            },
            error: function (response){
                console.error(response);
            }
        });
    });

    $('#loginForm').change(function() {
        $("#alertError").hide();
    });


    $("#forgotPasswordForm").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "generatePassword.php",
            type: "post",
            data: {
                email: $("#fpEmail").val()
            },
            beforeSend: function () {
                $("#fPSpinner").show();
                $("#forgotbtn").attr("disabled", "disabled");
            },
            success: function (data) {
                if (data == "Registered") {
                    $("#successAlertFP").show();
                    $("#errorAlertFP").hide();
                    $("#forgotPasswordForm").trigger("reset");
                } else {
                    $("#errorAlertFP").show();
                    $("#successAlertFP").hide();
                }
                console.log(data);
                $("#fPSpinner").hide();
                $("#forgotbtn").removeAttr("disabled");
            }
        });
    });

});