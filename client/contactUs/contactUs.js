$(document).ready(function () {

    $("#alertError").hide();
    $("#projectID").hide();
    $("#meetLoc").prop('disabled', true);

    const params1 = new URLSearchParams(location.search);
    $("#appointForm").submit(function (event) {
        event.preventDefault();
        if (params1.has('editing')) {
            $.ajax({
                url: "../contactUs/getData.php",
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
                    } else {
                        window.location.href = "../aboutUs/aboutUs.php";

                    }
                }
            });
        } else {
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
                    } else {
                        window.location.href = "../aboutUs/aboutUs.php";

                    }
                }
            });
        }
    });
    var valueEdit = {};
    $('#viewAppModal').click(function (e) {

        console.log("ayaw");
        e.preventDefault();
        // projectId = $(this).data("id");
        $.ajax({
            type: "post",
            url: "../contactUs/getData.php",
            data: { displaySchedDetails: true },
            dataType: "json",
            success: function (response) {

                console.log(response);
                var businessVar = '';
                $.each(response.businessType, function (indexInArray, data) {
                    businessVar = response.businessType.join(', ');
                });
                console.log(businessVar);
                $('#editBtnID').attr("data-id", response.client_id);
                $('#name_id').html(response.fullName);
                $('#contact_id').html(response.contactNo);
                $('#email_id').html(response.email);
                $('#projLoc_id').html(response.projLocation);
                $('#targetCons_id').html(response.targetDate);
                $('#projType_id').html(response.projectType);
                $('#lotArea_id').html(response.lotArea);
                $('#numStorey_id').html(response.noFloors);
                $('#business_id').html(businessVar);
                $('#meetType_id').html(response.meetType);
                $('#meetLoc_id').html(response.meetLoc);
                $('#meetDate_id').html(response.appointmentDate);
                $('#meetTime_id').html(response.appointmentTime);
                valueEdit = response;

            }
        });
    });

    const params = new URLSearchParams(location.search);
    if (params.has('editing')) {

        id = params.get('id');
        console.log(params.get('id'));

        $.ajax({
            type: "post",
            url: "../contactUs/getData.php",
            data: {
                getSchedEdit: id
            },
            dataType: "json",
            success: function (response) {
                console.log("hehe");
                $('#projectLocEdit').val(response.projLocation);
                $('#targetDate').val(response.targetDate);
                $('#cc-name').val(response.lotArea);
                $('#cc-number').val(response.noFloors);
                $('#meetType').val(response.meetType);
                $('#meetLoc').val(response.meetLoc);
                $('#appointmentDate').val(response.appointmentDate);
                $('#appointmentTime').val(response.appointmentTime);
                console.log(response.projectType);
                if (typeof $("input[value='" + response.projectType + "']").val() == 'undefined') {
                    $('#projectID').show();
                    $('#projectType7').attr('checked', 'checked');
                    $("input[name=projectTypeOthers]").val(response.projectType);
                } else {
                    $("input[name=projectType][value=" + response.projectType + "]").attr('checked', 'checked');
                }

                $.each(response.businessType, function (indexInArray, data) {
                    console.log($("input[value='" + data + "']").val());
                    $("input[value='" + data + "']").attr('checked', 'checked');
                    // $("input[name=businessTypeName].val(data);
                    if (typeof $("input[value='" + data + "']").val() == 'undefined') {
                        $('#btnOthers').attr('checked', 'checked');
                        $("input[name=businessTypeName]").val(data);
                    }
                });

            }
        });


    }

    $('#editBtnSched').click(function (e) {
        e.preventDefault();
        console.log($(this).attr('data-id'));
        window.location.href = "../contactUs/contactUs.php?editing=true";
    });


    $("[name='projectType']").change(function (event) {
        event.preventDefault();
        if ($(this).val() == "Others") {
            $("#projectID").show();
        } else {
            $("#projectID").hide();
        }
    });


    $("#meetType").change(function (event) {
        event.preventDefault();
        // console.log("gumana naman");
        var type = $(this).val();
        if (type == "virtual") {
            $("#meetLoc").prop('disabled', true);
        } else if (type == "meetUp") {
            $("#meetLoc").prop('disabled', false);
        }

    });

    var today = new Date().toISOString().split('T')[0];
    $("#appointmentDate").attr('min', today);
    var today = new Date().toISOString().split('T')[0];
    $("#targetDate").attr('min', today);

});
