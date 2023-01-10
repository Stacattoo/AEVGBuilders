$(document).ready(function () {

    $("#schedBtn").show();
    $("#appAlert").hide();
    //     $("#scheduleForm").submit(function (event) {
    //         event.preventDefault();
    $.ajax({
        url: "../contactUs/getData.php",
        type: "POST",
        dataType: "json",
        data: {
            checkAppointment: true
        },
        success: function (result) {
            if (result.status == "canceled" || result.status == "Finished") {
                $("#schedBtn").show();
                $("#appAlert").hide();
            } else {
                $("#schedBtn").hide();
                $("#appAlert").show();
            }

        }
    });

    $("#schedBtn").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../aboutUs/aboutUsProcess.php",
            data: { checkLogin: true },
            // dataType: "",
            success: function (response) {
                console.log(response);
                if (response == "banana") {
                    $("#loginPrompt").modal("show")

                } else if (response == "hanna") {
                    window.location.href = "../contactUs/contactUs.php";
                }
            }
        });
    });
    //     });

    // $("#date").change(function (event) {
    //     $("#time9amTo10am").prop("disabled", false);
    //     $("#time10amTo11am").prop("disabled", false);
    //     $("#time11amTo12nn").prop("disabled", false);
    //     $("#time1pmTo2pm").prop("disabled", false);
    //     event.preventDefault();
    //     $.ajax({
    //         url: "scheduleProcess.php",
    //         type: "POST",
    //         dataType: "json",
    //         data: {
    //             dateChanged: true,
    //             date: $('#date').val()
    //         },
    //         success: function (result) {
    // for (var i = 0; i < result.length; i++) {
    //     if (result[i] == $("#time9amTo10am").val()) {
    //         $("#time9amTo10am").prop("disabled", true);
    //     } else if (result[i] == $("#time10amTo11am").val()) {
    //         $("#time10amTo11am").prop("disabled", true);
    //     } else if (result[i] == $("#time11amTo12nn").val()) {
    //         $("#time11amTo12nn").prop("disabled", true);
    //     } else if (result[i] == $("#time1pmTo2pm").val()) {
    //         $("#time1pmTo2pm").prop("disabled", true);
    //     }
    // }

    //         }
    //     });

    // });

    $.ajax({
        type: "POST",
        url: "../../settings/settings.php",
        data: { GET_LOGO: true },
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            $(".img-logo").attr("src", "../" + response.logo);
        }, error: function (response) {
            console.error(response);
        }
    });

    $.ajax({
        type: "POST",
        url: "../../settings/settings.php",
        data: { GET_ABOUTUS: true },
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            $("#aboutUsAddress").html(response.address);
            $("#aboutUsContact").html(response.contact);
            $("#aboutUsEmail").html(response.email);
        }, error: function (response) {
            console.error(response);
        }
    });
});
