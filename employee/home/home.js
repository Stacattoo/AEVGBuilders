$(document).ready(function () {

    $("#content").load("../projects/projects.php");
    $("#errorAlert").hide();

    $(".nav-link").click(function (e) {
        e.preventDefault();
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });

    //Dashboard
    $("#dashboardNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../dashboard/dashboard.php");
    });
    //Clients
    $("#clientsNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../client/client.php");
    });
    //Materials
    $("#materialsNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../materials/materials.php");
    });
    //Schedule
    $("#scheduleNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../schedule/schedule.php");
    });
    //Report
    $("#reportNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../report/report.php");
    });
    //Projects
    $("#projectNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../projects/projects.php");
    });
    //profile
     $("#pass").on("show.bs.collapse", function () {
        $("#confirmPassword").removeAttr("disabled");
        $("#newPassword").removeAttr("disabled");
    });

    $("#pass").on("hidden.bs.collapse", function () {
        $("#newPassword").attr("disabled", "disabled");
        $("#confirmPassword").attr("disabled", "disabled");
    });

  
    $("#updateProfileModal").on("show.bs.modal", function () {
        $("#profileForm").trigger("reset");
        $("#errorAlert").hide();
        $.ajax({
            type: "POST",
            url: "profileProcess.php",
            data: { getEmployeeInfo: true },
            dataType: "JSON",
            success: function (data) {
                $("#username").val(data.username);
                $("#email").val(data.email);
            },
          
            error: function (response) {
                console.error(response.responseText);
                alert("SESSION expired login again");
                window.location.href = 'login/login.php';
            }
        });
    });


});