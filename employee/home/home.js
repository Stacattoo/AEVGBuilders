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
    $("#profileNav").click(function (e) {
        e.preventDefault();
        $("#content").load("../profile/profile.php");
    });



});