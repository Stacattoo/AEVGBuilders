$(document).ready(function () {

    $("#alertError").hide();
    $("#appointForm").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "../contactUs/appointmentProcess.php",
            type: "POST",
            dataType: "json",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                console.log(result);
                if (result.status == 'error') {
                    $("#alertError").html(result.msg);
                    $("#alertError").fadeIn();
                }else{
                    window.location.href="../aboutUs/aboutUs.php";
                }
            }
        });
    });

});
