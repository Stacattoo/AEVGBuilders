$(document).ready(function () {
    
    $("#registerSpinner").hide();
    $("#fPSpinner").hide();
    $("#errorAlert").hide();
    $("#errorAlertFP").hide();
    $("#successAlertFP").hide();

    $('#forgotPasswordModal').on('show.bs.modal', function (e) {
        $("#errorAlertFP").hide();
        $("#successAlertFP").hide();
        $("#forgotPasswordForm").trigger("reset");
    })

    $("#loginForm").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "loginProcess.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function () {
                $("#registerSpinner").show();
            },
            success: function (response) {
                $("#registerSpinner").hide();
                if (response.status == 'error') {
                    $("#errorAlert").html(response.msg);
                    $("#errorAlert").show();
                } else {
                    window.location.href = '../HomeAdmin.php';
                }
            },
            error: function (response) {
                $("#errorAlert").html("We encounter a problem when logging your account. Contact admin for more info");
                $("#errorAlert").show();
                console.error(response.responseText);
                $("#registerSpinner").hide();
            }
        });
    });
});

