$(document).ready(function () {

    // console.log($(this).val());
    $("#alertError").hide();
    $("#projectID").hide();
    // $("#step1").hide();
    $("#step2").hide();
    $("#step3").hide();
    $("#step4").hide();
    $("#meetLoc").prop('disabled', true);
    $(".projectTypeListImages").hide();
    // console.log(disableDate());
    // disableDate();
    var dateVar = ``;
    const params1 = new URLSearchParams(location.search);

    $("#step1Btn").click(function (e) {
        e.preventDefault();
        $("#step1").hide();
        $("#step2").show();
        $(".progress-bar").width("40%");
    });

    $("#prev1Btn").click(function (e) {
        e.preventDefault();
        $("#step1").show();
        $("#step2").hide();
        $(".progress-bar").width("20%");
    });

    $("#step2Btn").click(function (e) {
        e.preventDefault();
        $("#step2").hide();
        $("#step3").show();
        $(".progress-bar").width("70%");
    });

    $("#prev2Btn").click(function (e) {
        e.preventDefault();
        $("#step2").show();
        $("#step3").hide();
        $(".progress-bar").width("30%");
    });
    $("#step3Btn").click(function (e) {
        e.preventDefault();
        $("#step3").hide();
        $("#step4").show();
        $(".progress-bar").width("100%");
    });

    $("#prev3Btn").click(function (e) {
        e.preventDefault();
        $("#step3").show();
        $("#step4").hide();
        $(".progress-bar").width("70%");
    });


    $("#appointForm").submit(function (event) {
        // console.log("okey naman huehue");
        event.preventDefault();
        if (params1.has('editing')) {
            console.log("sa una");
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
            // console.log("sa pangalawa");
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
                , error: function (response) {
                    console.error(response);
                }
            });
        }
    });
    var valueEdit = {};
    $('#viewAppModal').click(function (e) {
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
                // console.log(businessVar);
                $('#editBtnID').attr("data-id", response.client_id);
                $('#name_id').val(response.fullName);
                $('#contact_id').val(response.contactNo);
                $('#email_id').val(response.email);
                $('#projLoc_id').val(response.projLocation);
                $('#targetCons_id').val(response.targetDate);
                $('#projType_id').val(response.projectType);
                $('#lotArea_id').val(response.lotArea);
                $('#numStorey_id').val(response.noFloors);
                $('#business_id').val(businessVar);
                $('#meetType_id').val(response.meetType);
                $('#meetLoc_id').val(response.meetLoc);
                $('#meetDate_id').val(response.appointmentDate);
                $('#meetTime_id').val(response.appointmentTime);
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
                console.log(response);
                $('#projLoc_id').val(response.projLocation);
                $('#targetDate').val(response.targetDate);
                $('#cc-name').val(response.lotArea);
                $('#cc-number').val(response.noFloors);
                $('#meetType').val(response.meetType);
                $('#meetLoc').val(response.meetLoc);
                $('#appointmentDate').val(response.appointmentDate);
                $('#appointmentTime').val(response.appointmentTime);
                $('#edit-image1').val(response.image);
                console.log(response.projectType);
                //radio button sa project type
                if (typeof $("input[value='" + response.projectType + "']").val() == 'undefined') {
                    $('#projectID').show();
                    $('#projectType7').attr('checked', 'checked');
                    $("input[name=projectTypeOthers]").val(response.projectType);
                } else {
                    $("[data-name='" + response.projectType + "']").show();

                    $("input[name=projectType][value='" + response.projectType + "']").attr('checked', 'checked');
                }
                //radio images 
                $("input[name=listGroupCheckableRadios][value='" + response.projImage + "']").attr('checked', 'checked');

                $.each(response.businessType, function (indexInArray, data) {
                    // console.log($("input[value='" + data + "']").val());
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
        let type = $(this).val();
        // console.log($("[data-name='" + type + "']").val());
        if (typeof $("[data-name='" + type + "']").val() == 'undefined') {
            $(".projectTypeListImages").show();
        } else {

            $(".projectTypeListImages").hide();
            $("[data-name='" + type + "']").show();
        }
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



    // function disableDate() {
    $.ajax({
        type: "POST",
        url: "../contactUs/getData.php",
        data: {
            checkSched: true
        },
        dataType: "json",
        success: function (response) {

            $.each(response, function (indexInArray, data) {
                // console.log(data);
                let toString = `${data.date}`;

                dateVar = toString;
                // console.log(dateVar);

                $("#targetDate").change(function (event) {
                    event.preventDefault();
                    // console.log("pasok");
                    if ($(this).val() == dateVar) {
                        alert("This date has been occupied");
                        $("#targetDate").val('');
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "../contactUs/getData.php",
                            data: {
                                checkSched: true
                            },
                            dataType: "json",
                            success: function (response) {
                                // console.log("kahit ano");
                                // if(disableDate() == response)
                            }
                        });
                    }

                });
                // }
            });
        }
    });
    // }



});
