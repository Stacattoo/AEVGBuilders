$(document).ready(function () {
    $("#errorAlert").hide();
    $("#errorAlertFP").hide();
    $("#successAlertFP").hide();
    $("#registerSpinner").hide();
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
                $("#registerSpinner").hide();
            }
        });
    });
});

