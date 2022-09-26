$(document).ready(function() {

    $("#errorAlertFP").hide();
    $("#successAlertFP").hide();
    $("#fPSpinner").hide();
    $("#load").hide();
    $("#send").show();

    $('#forgotPasswordForm').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: '../forgotPassword/forgotProcess.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function() {
                $("#fPSpinner").show();
                $("#load").show();
                $("#send").hide();
                $("#forgotbtn").attr("disabled", "disabled");
            },
            success: function(response) {
                console.log(response);
                if (response.status == 'error') {
                    $("#fPSpinner").hide();
                    $("#load").hide();
                    $("#send").show();
                    $("#forgotbtn").removeAttr('disabled');
                    $("#errorAlertFP").html(response.msg);
                    $("#errorAlertFP").show();
                } else {
                    $("#fPSpinner").hide();
                    $("#load").hide();
                    $("#send").show();
                    $("#successAlertFP").html(response.msg);
                    $("#successAlertFP").show();
                }
            }
        });
    });
});
$('#forgotPasswordForm').change(function(event) {
    $("#errorAlertFP").hide();
    $("#successAlertFP").hide();
    
    
});