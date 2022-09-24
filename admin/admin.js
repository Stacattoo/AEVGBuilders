$(document).ready(function () {
    // $("#content").load("dashboard/dashboard.php");
    $("#content").load("report/report.php");
    $("#errorAlert").hide();
    $(".nav-link").click(function (e) {
        e.preventDefault();
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });

    $("#dashboardNav").click(function (e) {
        e.preventDefault();
        $("#content").load("dashboard/dashboard.php");
    });

    $("#employeeNav").click(function (e) {
        e.preventDefault();
        $("#content").load("employee/employee.php");
    });

    $("#clientNav").click(function (e) {
        e.preventDefault();
        $("#content").load("client/client.php");
    });

    $("#reportNav").click(function (e) {
        e.preventDefault();
        $("#content").load("report/report.php");
    });

    $("#blockedNav").click(function (e) {
        e.preventDefault();
        $("#content").load("blocked/block.php");
    });

    $("#pass").on("show.bs.collapse", function () {
        $("#confirmPassword").removeAttr("disabled");
        $("#newPassword").removeAttr("disabled");
    });

    $("#pass").on("hidden.bs.collapse", function () {
        $("#newPassword").attr("disabled", "disabled");
        $("#confirmPassword").attr("disabled", "disabled");
    });

    setInterval(() => {
        $("#timeNow").html(moment().format('llll'));
    }, 1000);

    $("#updateProfileModal").on("show.bs.modal", function () {
        $("#profileForm").trigger("reset");
        $("#errorAlert").hide();
        $.ajax({
            type: "POST",
            url: "profileProcess.php",
            data: { getAdminInfo: true },
            dataType: "JSON",
            success: function (data) {
                $("#username").val(data.username);
                $("#email").val(data.email);
            },
            error: function (response) {
                console.log(response.responseText);
                alert("SESSION expired login again");
                window.location.href = 'index.html';
            }
        });
    });

    $("#profileForm").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "profileProcess.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if (response.status == 'error') {
                    $("#errorAlert").html(response.msg);
                    $("#errorAlert").show();
                } else {
                    $("#updateProfileModal").modal('hide');
                }
            },
            error: function (response) {
                console.log(response.responseText);
            }
        });
    });

});
