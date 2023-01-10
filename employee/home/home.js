$(document).ready(function () {

    $("#content").load("../client/client.php");
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
    $("#fclientsNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../client/finishedClients.php");
    });
    //Materials
    $("#materialsNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../materials/materials.php");
    });
    //Message
    $("#messageNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../message/message.php");
    });
    //Report
    $("#reportNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../reports/reports.php");
    });
    //Projects
    $("#projectNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../projects/projects.php");
    });
    $("#preProjectNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../projects/preProject.php");
    });
    $("#disProjectNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../projects/disapproveProj.php");
    });
    $("#profileNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../profile/profile.php");
    });
    $("#portfolio").click(function (e) {
        e.preventDefault();
        $("#content").load("../portfolio/portfolio.php");
    });

    $.ajax({
        type: "POST",
        url: "../../settings/settings.php",
        data: { GET_LOGO: true },
        success: function (response) {
            $(".img-logo").attr("src", response);
        }, error: function (response) {
            console.error(response);
        }
    });

});
